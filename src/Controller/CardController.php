<?php
namespace App\Controller;

use App\Entity\Card;
use App\Form\CardType;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route('/plan', name: 'plan')]
    public function index(Request $request, FileUploader $fileUploader, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $card = new Card();
        $form = $this->createForm(CardType::class, $card);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $mapFile */
            $mapFile = $form->get('map')->getData();
            if ($mapFile) {
                try {
                    $mapFileName = $fileUploader->upload($mapFile);
                    $card->setMapFilename($mapFileName);
                } catch (FileException $e) {
                    $this->addFlash("danger", "Le plan n'a pas été pris en compte !");
                }
                // Move the file to the directory where maps are stored
            }

            // ... persist the $product variable or any other work
            $em = $doctrine->getManager();
            $em->persist($card);
            $em->flush();
            $this->addFlash("success", "Le plan '{$card->getObjet()}' a été enregistré !");
            return $this->redirectToRoute('index');
        }

        return $this->render('card/carte.html.twig', [
            "form" => $form->createView(),
            "type" => "create",
        ]);
    }
}
