<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'category' => $categoryRepository->findAll(),
        ]);
    }
}
