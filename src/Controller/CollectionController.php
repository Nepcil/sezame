<?php

namespace App\Controller;

use App\Repository\CollectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionController extends AbstractController
{
    #[Route('/collection', name: 'app_collection')]
    public function index(CollectionRepository $collectionRepository): Response
    {
        return $this->render('collection/index.html.twig', [
            'collections' => $collectionRepository->findAll(),
        ]); 
    }

    #[Route('/pageBook', name: 'app_pageBook')]
    public function pageBook(CollectionRepository $collectionRepository): Response
    {
        return $this->render('collection/pageBook.html.twig', [
            'collection' => $collectionRepository->findAll(),
        ]); 
    }
}
