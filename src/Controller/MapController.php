<?php
namespace App\Controller;

use App\Entity\Map;
use App\Form\MapType;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapController extends AbstractController
{
    #[Route('/plan', name: 'plan')]
    public function index(Request $request, FileUploader $fileUploader, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $map = new Map();
        $form = $this->createForm(MapType::class, $map);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $mapFile */ // On récupère le fichier
            $mapFile = $form->get('map')->getData();
            if ($mapFile) {
                try {
                    $mapFileName = $fileUploader->upload($mapFile);
                    $map->setMapFilename($mapFileName);
                } catch (FileException $e) {
                    $this->addFlash("danger", "Le plan n'a pas été pris en compte !");
                }
            }

            $em = $doctrine->getManager();
            $em->persist($map);
            $em->flush();
            $this->addFlash("success", "Le plan '{$map->getObjet()}' a été enregistré !");
            return $this->redirectToRoute('index');
        }

        return $this->render('/map.html.twig', [
            "form" => $form->createView(),
            "type" => "create",
        ]);
    }
}
