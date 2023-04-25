<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_order')]
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('order/index.html.twig', [
            'order' => $orderRepository->findAll(),
        ]);
    }
}
