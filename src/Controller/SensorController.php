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
        // Récupérer le contenu JSON depuis le fichier
        $jsonContent = file_get_contents('./values.json');

        // Convertir le JSON en tableau associatif
        $data = json_decode($jsonContent, true);

        // Passer les données à la vue Twig
        return $this->render('sensor/capteur.html.twig', [
            'items' => $data['items']
        ]);
    }
}
