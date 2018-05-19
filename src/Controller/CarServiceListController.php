<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Service;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class CarServiceListController extends Controller
{
    /**
     * @Route("/user/carServices/{id}", name="carServices")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker, string $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository(Car::class)->findById($id);
        //$companies = $em->getRepository(Service::class)->findBy(['serviceCategory' => $car->getServiceCategory(),'serviceName' => $car->getServiceName()]);
        $companies = $em->getRepository(Service::class)->findByOrder($car->getServiceCategory(), $car->getServiceName());
        dump($companies);
        return $this->render('carServiceList.html.twig', [
            'car' => $car,
            'companies' => $companies
        ]);
    }
    
}
