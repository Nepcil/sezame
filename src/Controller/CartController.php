<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(SessionInterface $session, BookRepository $bookRepository): Response
    {
        $panier = $session->get('panier', []);
        $panierWidthData = [];
        foreach ($panier as $id => $quantity) {
            $panierWidthData[] = [
                'book' => $bookRepository->find($id),
                'quantity' => $quantity
            ];
        }
        $total = 0;
        foreach ($panierWidthData as $item) {
            $totalItem = $item['book']->getPrice() * $item['quantity'];
            $total += $totalItem;
        }
        return $this->render('cart/index.html.twig', [
            'items' => $panierWidthData, 
            'total' => $total
        ]);
    }
    
    #[Route('/panier/{id}', name: 'app_addCart')]
    public function addInCart($id, SessionInterface $session): Response
    { 
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1; 
        }
        $session->set('panier', $panier);
        
        return new Response(null,204);
    }

    #[Route('/panier/{$id}',name:'app_removeCart')]
    public function remove($id, SessionInterface $session){
        $panier = $session->get('panier', []);
        if($panier[$id]){
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $this->redirectToRoute("cart_index");
    }
    
}