<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TotoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
      $manager->flush();
    }
}
