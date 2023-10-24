<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecaudacionesController extends AbstractController
{
    #[Route('/recaudaciones', name: 'app_recaudaciones')]
    public function index(): Response
    {
        return $this->render('recaudaciones/index.html.twig', [
            'controller_name' => 'RecaudacionesController',
        ]);
    }
}
