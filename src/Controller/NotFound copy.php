<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForeseenController extends AbstractController
{
    #[Route("/not-found-foreseen", name:"foreseen-not-found")]
    public function FunctionName(): Response{
        return $this->render('notFound/notFoundForeseen.html.twig');
    }
}