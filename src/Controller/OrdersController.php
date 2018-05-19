<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Orders;
use App\Entity\Service;
use App\Form\ServiceForm;
use App\Form\OrdersForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class OrdersController extends Controller
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
        $newOrders = new Orders();
        $newCar = $this->getDoctrine()->getRepository(Car::class)->findAll();
        $service = $this->getDoctrine()->getRepository(Service::class)->findAll();

        $form = $this->createForm(OrdersForm::class, $newOrders);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            foreach ($service as $ser)
                foreach ($newCar as $car)
                    if ($ser->getServiceName() == $car->getServiceName() && $ser->getServiceCategory() == $car->getServiceCategory()) {
                        $newOrders->setServiceName($ser->getServiceName());
                        $newOrders->setServiceCategory($ser->getServiceCategory());
                        $newOrders->setUser($user);
                        $newOrders->setCar($car);
                        $em->persist($newOrders);
                        $em->flush();

                    }
        return $this->redirectToRoute('homepage');

        }
    }
    /**
     * @Route("/order/{id}", name="orderDetails")
     */
    public function Details(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }


        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        dump($order);

        return $this->render('orderDetails.html.twig', [
            'order' => $order
        ]);
    }
}
