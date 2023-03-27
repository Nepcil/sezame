<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('book/accueil.html.twig', [
            'book' => $bookRepository->findAll(),
        ]); 
    }

    #[Route('/books', name: 'app_books')]
    public function books(BookRepository $bookRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bookRepository->findAll(),
        ]); 
    }

    #[Route('/showBook/{id}', name: 'app_showBook')]
    public function show(BookRepository $bookRepository): Response
    {
        return $this->render('book/showBook.html.twig', [
            'showBook' => $bookRepository->findAll(),
        ]); 
    }

}
