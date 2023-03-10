<?php

namespace App\DataFixtures;

use App\Entity\Collection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $collection = new Collection();
        $manager->persist($collection);

        $manager->flush();
    }
}
