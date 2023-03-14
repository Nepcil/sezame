<?php

namespace App\Controller;

use App\Form\resultSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\Routing\Annotation\Route;

class ResultSearchController extends AbstractController
{
    #[Route('/resultSearch', name:'app_resultSearch')]
    public function search(Request $request)
    {
        $resultSearchForm = $this->createFormBuilder(resultSearchType::class);
        return $this->render('search/resultSearch.html.twig',[
            'resultSearch_Form' => $resultSearchForm->createView()
        ]);
    }
}