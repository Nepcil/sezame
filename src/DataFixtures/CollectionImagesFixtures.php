<?php

namespace App\DataFixtures;

use App\Entity\CollectionImages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectionImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $collectionImages = new CollectionImages();
            $collectionImages->setPath('bd.jpg');
            $collectionImages->setPosition(1);
            $manager->persist($collectionImages);
    
            $manager->flush();
        }
        public function getDependencies()
        {
            return [
                CollectionFixtures::class,
            ];
        }
}
