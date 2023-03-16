<?php

namespace Book;

use App\Admin\Field\VichFileField;
use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    public function configureFilters(Filters $filters) : Filters
    {
        return $filters->add('Category')
            ->add('Author');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {

        yield AssociationField::new('Categorie')->autocomplete();
        yield Field::new('title');
        yield AssociationField::new('user');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);

        yield FormField::addPanel('Votre Livre'); 
        yield VichFileField::new('Livre au format pdf')->onlyOnForms() ;
        yield Field::new('Résumé du livre');

        yield FormField::addPanel('Votre Livre'); 
        yield Field::new('Votre prénom');
        yield Field::new('Votre nom');
        yield AssociationField::new('Ajouter un co-auteur');

        yield FormField::addTab('Couvertures');
        yield CollectionField::new('bookPictures')
                ->setTemplatePath('admin/book/bookPictures.html.twig')
                ->setEntryType(BookImageType::class);
    }

}
