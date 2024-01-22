<?php 

namespace App\Service;

use App\Repository\RestaurantRepository;
use Symfony\Component\Filesystem\Filesystem;

class RestaurantService
{
    private $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function export(): string
    {
        $restaurants = $this->restaurantRepository->findAll();
        $totalRestaurants = count($restaurants);

        $titles = array_map(function ($restaurant) {
            return $restaurant->getTitle();
        }, $restaurants);

        $content = "Hay un total de " . $totalRestaurants . " restaurantes:\n";
        $content .= implode("\n", $titles);

        $filesystem = new Filesystem();
        $filename = 'restaurants-' . date('Y-m-d') . '.txt';

        $filesystem->dumpFile($filename, $content);

        return $filename;
    }
}