<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('home/accueil.html.twig', [
            'book' => $bookRepository->findAll()
        ]); 
    }

    #[Route('/book', name: 'app_book')]
    public function books(BookRepository $bookRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bookRepository->findAll(),
            'categories' => $categoryRepository->findAll()
        ]);
    }

    #[Route('/showBook', name: 'app_showBook')]
    public function show(BookRepository $bookRepository): Response
    {
        return $this->render('book/showBook.html.twig', [
            'books' => $bookRepository->findAll()
        ]); 
    }

}
