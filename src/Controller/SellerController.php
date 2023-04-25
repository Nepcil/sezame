<?php

namespace App\Controller;

use App\Repository\SellerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SellerController extends AbstractController
{
    #[Route('/seller', name: 'app_seller')]
    public function index(SellerRepository $sellerRepository): Response
    {
        return $this->render('seller/index.html.twig', [
            'seller' => $sellerRepository->findAll(),
        ]);
    }
}
