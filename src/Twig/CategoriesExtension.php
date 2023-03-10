<?php

namespace App\Twig;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CategoriesExtension extends AbstractExtension
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('categories',[$this,'getCategories'])
        ];
    }

    public function getCategories  ()
    {
        return $this->entityManager->getRepository(Category::class)->findBy([],['name ' => 'ASC']);
    } 
}
