<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RestaurantRepository;
use App\Service\RestaurantService;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;


class RestaurantController extends AbstractController
{

    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
}

    #[Route('/restaurants', name: 'restaurant_index')]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        $restaurants = $restaurantRepository->findAll();

        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }

    #[Route('/restaurants/export', name: 'restaurant_export')]
    public function export(): Response
    {
        try {
            $filename = $this->restaurantService->export();
            return new Response(file_get_contents($filename), 200, [
                'Content-Type' => 'text/plain',
                'Content-Disposition' => 'attachment; filename="' . basename($filename) . '"'
            ]);
        } catch (IOExceptionInterface $exception) {
            return new Response('Error occurred: ' . $exception->getMessage(), 500);
        }
    }

    #[Route('/restaurants/{id}/{id_image?}', name: 'restaurant_show')]
    public function showWithImage(RestaurantRepository $restaurantRepository, int $id, ?int $id_image = null): Response
    {
        $restaurant = $restaurantRepository->find($id);

        return $this->render('restaurant/detail.html.twig', [
            'restaurant' => $restaurant,
            'id_image' => $id_image
        ]);
    }
}
