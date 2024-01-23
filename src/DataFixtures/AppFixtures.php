<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Restaurant;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 6; $i++) {
            $restaurant = new Restaurant();
            $restaurant->setTitle('Restaurant ' . $i);
            $restaurant->setDescription('Descripción del Restaurant ' . $i);
            $restaurant->setWebsite('http://restaurant' . $i . '.com');
            $restaurant->setRating(mt_rand(1, 10));

            $manager->persist($restaurant);
        }

        $manager->flush();
    }
}
