<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;


class LoginController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('login/login.html.twig', [

        ]);
    }

    /**
     * @Route("/logout")
     * @throws \RuntimeException
     */
    public function logoutAction()
    {
        throw new \RuntimeException("This should never be called directly");
    }
}
