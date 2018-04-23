<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginUserController extends Controller
{
    /**
     * @Route("/login/user", name="login_user")
     */
    public function index()
    {
        return $this->render('Login//index.html.twig', [
            'controller_name' => 'LoginUserController',
        ]);
    }
}
