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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // Récupérer le contenu JSON depuis le fichier
        $jsonContent = file_get_contents('./values.json');

        // Convertir le JSON en tableau associatif
        $data = json_decode($jsonContent, true);

        // Arrondir les valeurs à un chiffre après la virgule
        foreach ($data['items'] as &$item) {
            foreach ($item as &$reading) {
                $reading['temperature'] = round($reading['temperature'], 1);
                $reading['pression'] = round($reading['pression'], 1);
                $reading['qualite'] = round($reading['qualite'], 1);
            }
        }

        // Passer les données à la vue Twig
        return $this->render('/capteur.html.twig', [
            'items' => $data['items']
        ]);
    }
}
