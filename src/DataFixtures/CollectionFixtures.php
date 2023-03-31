<?php

namespace App\DataFixtures;

use App\Entity\Collection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionFixtures extends Fixture
{
    public const COLLECTION = 'COLLECTION';

    public function load(ObjectManager $manager): void
    {
        $collectionManager = new Collection();
        $collectionManager->setTitle('titre de l\'ouvrage');
        $collectionManager->setSummary('resumé de l\'ouvrage');
        $collectionManager->setPrice(12);
        $this->addReference(self::COLLECTION, $collectionManager);
        

        $manager->persist($collectionManager);
        $manager->flush();
    }
}
