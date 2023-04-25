<?php

namespace App\Controller;

use App\Repository\CollectionBookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionBookController extends AbstractController
{
    #[Route('/collectionBook', name: 'app_collectionBook')]
    public function index(CollectionBookRepository $collectionRepository): Response
    {
        return $this->render('collectionBook/index.html.twig', [
            'collectionBooks' => $collectionRepository->findAll(),
        ]); 
    }

    #[Route('/pageBook', name: 'app_pageBook')]
    public function pageBook(CollectionBookRepository $collectionRepository): Response
    {
        return $this->render('collectionBook/pageBook.html.twig', [
            'collectionBooks' => $collectionRepository->findAll(),
        ]); 
    }
}
