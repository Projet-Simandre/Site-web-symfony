<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReseauController extends AbstractController
{
    #[Route("/reseau", name:"reseau")]
    public function FunctionName(): Response{
        return $this->render('/reseau.html.twig');
    }
}