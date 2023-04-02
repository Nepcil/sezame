<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/index.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]); 
    }

    #[Route('/showAuthor', name: 'app_showAuthor')]
    public function showAuthor(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/showAuthor.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]); 
    }
}
