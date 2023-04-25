<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
        yield TextField::new('bibliography');
    }
    
}
