<?php

namespace App\Controller\Admin;

use App\Entity\CollectionBook;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CollectionBookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CollectionBook::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield Field::new('title'),
            yield TextEditorField::new('summary'),
            yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false),
            yield Field::new('createdAt')->onlyOnIndex(),
            yield DateTimeField::new('updatedAt')->onlyOnIndex(),
        ];
    }
    
}
