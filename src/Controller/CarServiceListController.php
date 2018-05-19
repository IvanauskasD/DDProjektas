<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Service;
use App\Entity\Orders;
use App\Entity\Company;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;
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
    /**
     * @Route("/user/carServices/car={car_id}&&company={company_id}", name="RegisterCarService")
     */
    public function Register(AuthorizationCheckerInterface $authorizationChecker, string $car_id, int $company_id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository(Company::class)->find($company_id);
        $car = $em->getRepository(Car::class)->find($car_id);
        
        $newOrder = new Orders();
        $newOrder->setCompany($company);
        $newOrder->setCar($car);
        $newOrder->setDuration(4);
        $newOrder->setStartDate(new \DateTime('tomorrow'));
        $newOrder->setFinishDate(new \DateTime('tomorrow'));
        $newOrder->setStatus('Waiting');
        dump($newOrder);
        $em->persist($newOrder);
        $em->flush();
        return $this->render('profile/index.html.twig',
            ['error' => null]);
    }
    
}
