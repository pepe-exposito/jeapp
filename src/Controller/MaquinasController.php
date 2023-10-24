<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaquinasController extends AbstractController
{
    #[Route('/maquinas', name: 'app_maquinas')]
    public function index(): Response
    {
        return $this->render('maquinas/index.html.twig', [
            'controller_name' => 'MaquinasController',
        ]);
    }
}
