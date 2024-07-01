<?php /* Controller de la gestion du colpte "admin" */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController // SecurityController.php
{
    #[Route("/login", name: "admin")]
    public function admin(AuthenticationUtils $Utils)
    {
        $error = $Utils->getLastAuthenticationError();
        return $this->render('/admin.html.twig', ['error' => $error]);
    }

    #[Route("/logout", name: "logout")]
    public function logout()
    {
    }
}