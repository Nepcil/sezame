<?php

namespace App\DataFixtures;

use App\Entity\Collection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $collectionManager = new Collection();
        $collectionManager->setTitle('titre de l\'ouvrage');
        $collectionManager->setSummary('resumé de l\'ouvrage');
        $collectionManager->setPrice(12);

        $manager->persist($collectionManager);
        $manager->flush();
    }
}
