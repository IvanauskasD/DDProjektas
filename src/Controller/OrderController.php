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
        $newCar = new Car();
        $newService = new Service();
        $newOrder = new Order();
        $service = $this->getDoctrine()->getRepository(Service::class)->findAll();

        $form = $this->createForm(OrderForm::class, $newOrder);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $newOrder->setUser($user);
            foreach($cars as $temp)
            $newOrder->setCar($temp);
            $em->persist($newOrder);


            $em->flush();

            echo "what";

            return $this->redirectToRoute('homepage');
        }

        return $this->render('order/index.html.twig', [
            'order' => $form->createView()
        ]);
    }
}
