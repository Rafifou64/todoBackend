<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\TodoRepository;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $todo = Array();
        for ($i = 0; $i < 50; $i++) {
            $todo[$i] = new Todo();
            $todo[$i]->setName($faker->name);
            $todo[$i]->setDescription($faker->text);
   
            $manager->persist($todo[$i]);
        }

        $manager->flush();
    }
}
