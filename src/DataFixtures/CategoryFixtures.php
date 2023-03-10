<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = 'CATEGORY';
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('genre');
        $manager->persist($category);
        $this->addReference(self::CATEGORY, $category);

        $manager->flush();
    }
}
