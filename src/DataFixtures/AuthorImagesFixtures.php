<?php

namespace App\DataFixtures;

use App\Entity\AuthorImages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AuthorImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $authorImages = new AuthorImages();
        $authorImages->setPath('bd.jpg');
        $authorImages->setAuthor($this->getReference(AuthorFixtures::AUTHOR));

        $manager->persist($authorImages);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
    }
}

