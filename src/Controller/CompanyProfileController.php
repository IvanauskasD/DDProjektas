<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompanyProfileController extends Controller
{
    /**
     * @Route("/company/profile", name="companyProfile")
     */
    public function index()
    {
        return $this->render('profile/companyProfile.html.twig', [
            'controller_name' => 'CompanyProfileController',
        ]);
    }
}
