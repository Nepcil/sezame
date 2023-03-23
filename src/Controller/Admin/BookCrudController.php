<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichFileField;
use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookCrudController extends AbstractCrudController
{
    #[Route('/book/{id<\d+>}', name: 'app_book')]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book,
        ]);
    }

    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // yield AssociationField::new('Categorie')->autocomplete();
        yield Field::new('title');
        // yield AssociationField::new('user');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);

        yield FormField::addPanel('Votre Livre'); 
        yield VichFileField::new('Livre au format pdf')->onlyOnForms() ;
        yield Field::new('Résumé du livre');

        yield FormField::addTab('Couvertures');
        yield CollectionField::new('bookPictures')
                ->setTemplatePath('admin/book/bookPictures.html.twig')
                ->setEntryType(BookImageType::class);

    }

}
