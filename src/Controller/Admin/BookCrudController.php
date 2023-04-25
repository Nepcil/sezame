<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichFileField;
use App\Entity\Book;
use App\Form\BookType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class BookCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield Field::new('title');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);

        yield FormField::addPanel('Information générales'); 
        yield VichFileField::new('bookImages')->onlyOnForms();
        yield VichFileField::new('bookReader')->onlyOnForms(); 
        yield TextEditorField::new('summary');

        yield FormField::addPanel('Couvertures de bd'); 
        yield FormField::addTab('path');
        yield CollectionField::new('bookImages')
                ->allowAdd(true)
                ->allowDelete(true)
                ->setTemplatePath('admin/book/bookPictures.html.twig')
                ->setEntryType(BookType::class )
                ;
        yield DateTimeField::new('createdAt')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')->onlyOnIndex();
    }

}
