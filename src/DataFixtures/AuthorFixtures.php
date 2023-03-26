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
        $authorManager->setFirstname('prenom de l\'auteur');
        $authorManager->setLastname('nom de l\'auteur');  

        $manager->flush();
    }
}
