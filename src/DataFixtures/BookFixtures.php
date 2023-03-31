<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public const BOOK = 'BOOK';

    public function load(ObjectManager $manager): void
    {
        $bookManager = new Book();
        $bookManager->setImageName('nom de l\'image');
        $bookManager->setTitle('titre de l\'ouvrage');
        $bookManager->setSummary('resumé de l\'ouvrage');
        // $bookManager->setCategory($this->getReference(CategoryFixtures::BOOK));
        // $bookManager->setAuthor($this->getReference(AuthorFixtures::BOOK));
        // $bookManager->setCollection($this->getReference(CollectionFixtures::BOOK));
        $bookManager->setPrice(12);
        $this->addReference(self::BOOK, $bookManager);

        $manager->persist($bookManager);
        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            CategoryFixtures::class,
            AuthorFixtures::class,
            CollectionFixtures::class,
        ];
    }
}
