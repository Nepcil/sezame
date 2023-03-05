<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $bookManager = new Book();
        $bookManager->setTitle('titre de BD');
        $bookManager->setPicture('bool&bill.jpg');
        $bookManager->setSummary('ceci est un ouvrage de bande dessinée');
        $bookManager->setIsbn(978);
        $bookManager->setPrice(12,50);
        $bookManager->setRanking(3);

        $manager->persist($bookManager);
        $manager->flush();
    }
}
