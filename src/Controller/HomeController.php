<?php

namespace App\Controller;

use App\Entity\Card;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        // Charger le fichier JSON
        $jsonContent = file_get_contents('./values.json');
        $data = $serializer->decode($jsonContent, 'json');

        // Calculer les moyennes
        $moyennes = $this->calculerMoyennes($data['items']);
        $latestUpload = $this->getLatestUpload($em);

        $temperature = $moyennes['temperature'];

        // Initialisez une variable pour stocker la classe CSS de couleur
        $colorClass = '';

        // Déterminez la classe CSS en fonction de la température
        if ($temperature >= 25) {
            $colorClass = 'high-temp';
        } else if ($temperature >= 21) {
            $colorClass = 'medium-high-temp';
        } else if ($temperature >= 10) {
            $colorClass = 'medium-temp';
        } else if ($temperature >= 0) {
            $colorClass = 'low-temp';
        } else if ($temperature >= -10) {
            $colorClass = 'very-low-temp';
        } else {
            $colorClass = 'default-temp';
        }
        return $this->render('home/index.html.twig', [
            'moyennes' => $moyennes, 'colorClass' => $colorClass, 'latestUpload' => $latestUpload
        ]);
    }

    // Fonction pour calculer les moyennes
    private function calculerMoyennes(array $items): array
    {
        $totalTemperature = 0;
        $totalHumidite = 0;
        $totalQualite = 0;
        $totalItems = count($items) * count($items[0]);

        foreach ($items as $item) {
            foreach ($item as $data) {
                $totalTemperature += $data['temperature'];
                $totalHumidite += $data['humidite'];
                $totalQualite += $data['qualite'];
            }
        }

        $moyennes = [
            'temperature' => $totalTemperature / $totalItems,
            'humidite' => $totalHumidite / $totalItems,
            'qualite' => $totalQualite / $totalItems,
        ];

        return $moyennes;
    }

    public function getLatestUpload(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Card::class);
        $latestUpload = $repository->findOneBy([], ['id' => 'DESC']);

        return $latestUpload;
    }
}
