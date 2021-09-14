<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Season;

class SeasonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {  
            $season = new Season();  
            $season->setYear(mt_rand(10, 100));  
            $manager->persist($season); 
        }
        $manager->flush();
    }
}
