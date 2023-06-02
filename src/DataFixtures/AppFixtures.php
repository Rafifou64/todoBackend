<?php

namespace App\DataFixtures;

use App\Entity\Priority;
use App\Entity\Todo;
use App\Repository\PriorityRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\TodoRepository;
use Doctrine\Persistence\ManagerRegistry;
use Faker;

class AppFixtures extends Fixture
{
    public PriorityRepository $priorityRepository;

    public function __construct(PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }

    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $todo = Array();
        $priority = $this->priorityRepository->findOneBy(['id' => 1]);

        for ($i = 0; $i < 50; $i++) {   
            $todo[$i] = new Todo();
            $todo[$i]->setName($faker->name);
            $todo[$i]->setDescription($faker->text);
            $todo[$i]->setDone(false);
            $todo[$i]->setPriority($priority);
   
            $manager->persist($todo[$i]);
        }

        $manager->flush();
    }
}
