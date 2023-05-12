<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichFileField;
use App\Entity\Book;
use App\Form\BookType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class BookCrudController extends AbstractCrudController
{
    public function configureFilters(Filters $filters) : Filters
    {
        return $filters->add('category');
    }

    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Information générales');
        yield Field::new('title');
        yield AssociationField::new('category')->autocomplete(); 
        yield TextEditorField::new('summary');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);
        
        yield FormField::addPanel('BD');
        // yield VichFileField::new('imageName')->onlyOnForms();
        yield CollectionField::new('bookImages')
                    ->setTemplatePath('admin/book/bookPictures.html.twig')
                    ->setEntryType(BookType::class)
                    ->onlyOnForms();

        yield DateTimeField::new('createdAt')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')->onlyOnIndex();
    }

}
