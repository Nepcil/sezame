<?php

namespace App\DataFixtures;

use App\Entity\CollectionBook;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionBookFixtures extends Fixture 
{
    public const COLLECTION = 'COLLECTION';

    public function load(ObjectManager $manager): void
    {
        $collectionManager = new CollectionBook();
        $collectionManager->setTitle('titre de l\'ouvrage');
        $collectionManager->setSummary('resumé de l\'ouvrage');
        $collectionManager->setImageName('bd.jpg');
        $this->addReference(self::COLLECTION, $collectionManager);
        $collectionManager->setPrice(12);

        $manager->persist($collectionManager);
        $manager->flush();
    }
    
}
