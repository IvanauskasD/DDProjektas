<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Order;
use App\Entity\Service;
use App\Form\ServiceForm;
use App\Form\OrderForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class OrderController extends Controller
{
    /**
     * @Route("/order", name="order")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }


        $user = $this->getUser();
        $cars = $user->getCars();
        $em = $this->getDoctrine()->getManager();
        $newService = new Service();
        $newOrder = new Order();
        $newCar = $this->getDoctrine()->getRepository(Car::class)->findAll();
        $service = $this->getDoctrine()->getRepository(Service::class)->findAll();

        $form = $this->createForm(OrderForm::class, $newOrder);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            foreach ($service as $ser)
                foreach ($newCar as $car)
                    if ($ser->getServiceName() == $car->getServiceName() && $ser->getServiceCategory() == $car->getServiceCategory()) {
                        $newOrder->setServiceName($ser->getServiceName());
                        $newOrder->setServiceCategory($ser->getServiceCategory());
                        $newOrder->setUser($user);
                        $newOrder->setCar($car);
                        $em->persist($newOrder);
                        $em->flush();

                    }
        return $this->redirectToRoute('homepage');

        }


        return $this->render('order/index.html.twig', [
            'order' => $form->createView()
        ]);
    }
}
