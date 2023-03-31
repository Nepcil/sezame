<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichFileField;
use App\Entity\Book;
use App\Form\BookType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class BookCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    // public function configureFilters(Filters $filters) : Filters
    // {
    //     return $filters->add('Category');
    // }

    // public function configureActions(Actions $actions): Actions
    // {
    //     return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    // }

    public function configureFields(string $pageName): iterable
    {
        // yield AssociationField::new('category')->autocomplete();
        yield Field::new('title');
        // yield AssociationField::new('user');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);

        yield FormField::addPanel('Information générales'); 
        yield VichFileField::new('bookImages')->onlyOnForms() ;
        yield TextEditorField::new('summary'); 
        yield Field::new('updatedAt')->onlyOnIndex();

        yield FormField::addPanel('Couvertures de bd'); 
        yield CollectionField::new('bokkImages')
                ->allowAdd(true)
                ->allowDelete(true)
                ->setTemplatePath('admin/book/bookPictures.html.twig')
                ->setEntryType(BookType::class );

    }

}
