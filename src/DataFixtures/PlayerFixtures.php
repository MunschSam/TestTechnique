<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Player;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {  
            $player = new Player();  
            $player->setName('Nom ' . $i);
            $player->setEmail('Email ' . $i);
            $player->setFirstname('Prenom ' . $i);
            $player->setMatchPlayed(mt_rand(10, 100));
            $player->setPlayTime(mt_rand(10, 100));
            $player->setGoalScored(mt_rand(10, 100));
            $player->setDecisivePass(mt_rand(10, 100));
            $manager->persist($player);  
        }
        $manager->flush();
    }
}
