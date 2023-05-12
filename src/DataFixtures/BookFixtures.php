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
        $bookManager->setTitle('titre de l\'ouvrage');
        $bookManager->setCategory($this->getReference(CategoryFixtures::CATEGORY));
        $bookManager->setSummary('resumé de l\'ouvrage');
        $this->addReference(self::BOOK, $bookManager);
        $bookManager->setPrice(12);

        $manager->persist($bookManager);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }

}
