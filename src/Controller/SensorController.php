<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SensorController extends AbstractController
{
    #[Route('/capteur', name: 'sensor')]
    public function index(): Response
    {
        return $this->render('sensor/capteur.html.twig', [
            'controller_name' => 'SensorController',
        ]);
    }
}
