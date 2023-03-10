<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $bookManager = new Book();
        $bookManager->setTitle('titre de l\'ouvrage');
        $bookManager->setPicture('picture.jpg');
        $bookManager->setSummary('resumé de l\'ouvrage');
        $bookManager->setIsbn(00000000000);
        $bookManager->setPrice(12);
        $bookManager->setRanking(3);

        $manager->persist($bookManager);
        $manager->flush();
    }
}
