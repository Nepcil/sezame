<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Routing\Annotation\Route;
use ApiPlatform\OpenApi\Model\Response;

class AuthorCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Author::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield Field::new('firstname');
        yield Field::new('lastname');
    }
    
}