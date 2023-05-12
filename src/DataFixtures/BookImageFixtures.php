<?php

namespace App\DataFixtures;

use App\Entity\BookImages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookImageFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $bookImages = new BookImages();
        $bookImages->setPath('bd.jpg'); 
        $bookImages->setBook($this->getReference(BookFixtures::BOOK));
        $manager->persist($bookImages);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            BookFixtures::class,
        ];
    }
}

