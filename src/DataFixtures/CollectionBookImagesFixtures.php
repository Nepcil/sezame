<?php

namespace App\DataFixtures;

use App\Entity\CollectionBookImages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CollectionBookImagesFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
            $collectionImages = new CollectionBookImages();
            $collectionImages->setPath('bd.jpg');
            $collectionImages->setPosition(1);
            $collectionImages->setCollectionBook($this->getReference(CollectionBookFixtures::COLLECTION));
            $manager->persist($collectionImages);
    
            $manager->flush();
        }
        public function getDependencies()
        {
            return [
                CollectionBookFixtures::class,
            ];
        }
}
