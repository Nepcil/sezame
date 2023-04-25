<?php

namespace App\Controller;

use App\Repository\BuyerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyerController extends AbstractController
{
    #[Route('/buyer', name: 'app_buyer')]
    public function index(BuyerRepository $buyerRepository): Response
    {
        return $this->render('buyer/index.html.twig', [
            'buyer' => $buyerRepository->findAll(),
        ]);
    }
}
