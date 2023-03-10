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

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    /**
     * @Route("/book/add", name="book_add")
     * @Route("/book/{id}/edit", name="book_edit")
     */
    public function index(?Book $book, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$book){
            $book = new Book();
        }

        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()){
        if(!$book->getId()){
            $entityManager->persist($book);
            dump($book);die;
        }
        $entityManager->flush();
        return $this->redirect($this->generateUrl('book_edit', ['id' => $book->getId()]));
    }

        return $this->render('default/index.html.twig', [
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
            ->add('ranking')
        ;
    }
}