<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture 
{
    public const BOOK = 'BOOK';

    public function load(ObjectManager $manager): void
    {
        $bookManager = new Book();
        $bookManager->setImageName('nom de l\'image');
        $bookManager->setTitle('titre de l\'ouvrage');
        $bookManager->setSummary('resumé de l\'ouvrage');
        $this->addReference(self::BOOK, $bookManager);
        $bookManager->setPrice(12);

        $manager->persist($bookManager);
        $manager->flush();
    }
}
