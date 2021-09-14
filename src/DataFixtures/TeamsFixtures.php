<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Teams;

class TeamsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {  
            $team = new Teams();  
            $team->setName('Team ' . $i);
            $team->setLevel('Niveau ' . $i);   
            $manager->persist($team);  
        }
        $manager->flush();
    }
}
