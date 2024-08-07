<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoricController extends AbstractController
{
    #[Route("/historique", name:"historique")]
    public function index(): Response{
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('/historic.html.twig');
    }
}