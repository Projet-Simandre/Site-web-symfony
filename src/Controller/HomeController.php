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
        $humidite = $moyennes['humidite'];
        $qualite = $moyennes['qualite'];

        // Initialisez une variable pour stocker la classe CSS de couleur
        $colorClass = '';
        $temp = 0;
        $hum = 0;
        $qual = 0;

        // Déterminez la classe CSS en fonction de la température
        if ($temperature >= 25) {
            $temp = 5;
        } else if ($temperature >= 21) {
            $temp = 4;
        } else if ($temperature >= 10) {
            $temp = 3;
        } else if ($temperature >= 0) {
            $temp = 4;
        } else if ($temperature >= -10) {
            $temp = 5;
        } else {
            $temp = 6;
        }

        if ($humidite >= 80) {
            $hum = 10;
        } else if ($humidite >= 60) {
            $hum = 5;
        } else if ($humidite >= 40) {
            $hum = 3;
        } else if ($humidite >= 20) {
            $hum = 5;
        } else {
            $hum = 6;
        }

        if ($qualite >= 80) {
            $qual = 6;
        } else if ($qualite >= 60) {
            $qual = 5;
        } else if ($qualite >= 40) {
            $qual = 5;
        } else if ($qualite >= 20) {
            $qual = 3;
        } else {
            $qual = 1;
        }

        if ($temp + $hum + $qual >= 15) {
            $colorClass = 'high-temp';
        } else if ($temp + $hum + $qual >= 12) {
            $colorClass = 'medium-high-temp';
        } else if ($temp + $hum + $qual >= 7) {
            $colorClass = 'medium-temp';
        } else {
            $colorClass = 'low-temp';
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
