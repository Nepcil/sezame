<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CreatetController extends AbstractController
{
    #[Route('/create', name: 'app_create')]
    #[Route('/create/add', name:'create_add')]
    #[Route('/create/{id}/edit', name:'create_edit')]
    
    public function index(?Book $book, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$book) {
            $book = new Book();
        }

        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('book_edit', ['id' => $book->getId()]));
        }

        return $this->render('create/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('picture')
            ->add('summuary')
            ->add('isbn')
            ->add('price')
        ;
    }
}
