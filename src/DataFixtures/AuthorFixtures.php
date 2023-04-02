<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $authorManager = new Author();
        $authorManager->setFirstname('Artur');
        $authorManager->setLastname('Martin'); 
        $authorManager->setBibliography('Je suis un auteur');  

        $manager->persist($authorManager);
        $manager->flush();
    }
}
