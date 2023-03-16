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
        $bookImage = new BookImages();
        $bookImage->setPath('bd.jpg');
        $bookImage->setPosition(1);
        $bookImage->setBook($this->getReference(BookFixtures::BOOK));
        $manager->persist($bookImage);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            BookFixtures::class,
        ];
    }
}

