<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture 
{
    public const AUTHOR = 'AUTHOR';

    public function load(ObjectManager $manager): void
    {
        $authorManager = new Author();
        $authorManager->setFirstname('Artur');
        $authorManager->setLastname('Martin'); 
        $authorManager->setBibliography('Je suis un auteur');
        $this->addReference(self::AUTHOR, $authorManager) ;

        $manager->persist($authorManager);
        $manager->flush();
    }
}
