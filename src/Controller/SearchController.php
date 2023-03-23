<?php

namespace App\Controller;

use App\Form\MySearchType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/searchtest', name: 'app_search')]
    public function searchBar(
        array $mySearch = []
        )
    {
        $form = $this->createForm(MySearchType::class, 
            $mySearch,
            options: [
                'method' => 'GET',
                'action' => $this->generateUrl('app_search'),
        ]);

        return $this->render('search/resultSearch.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function index(
        Request $request,
        BookRepository $bookRepository
    ): Response
    {
        $form = $this->createForm(MySearchType::class, options: [
            'method' => 'GET',
        ]);
        $form->handleRequest($request);
        $q = $form->get('q')->getData();

        $bookRepository->createSearchQueryBuilder($q);

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
}
