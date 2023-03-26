<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    #[Route('/book', name: 'app_book')]
    #[Route('/showBook/{id<\d+>}', name: 'app_showBook')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();

        return $this->render('home/accueil.html.twig', [
            'book' => 'book',
        ]); 
        return $this->render('book/index.html.twig', [
            $books,
        ]); 
        return $this->render('showBook/showBook.html.twig', [
            $books,
        ]); 
    }


}
