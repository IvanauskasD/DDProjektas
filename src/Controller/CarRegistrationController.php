<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Entity\Car;
use App\Form\CarForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
class CarRegistrationController extends Controller
{
    /**
     * @Route("/carRegistration", name="CarRegistration")
     * @throws \LogicException
     */
    public function carRegisterAction(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $newCar = new Car();



        $form = $this->createForm(CarForm::class, $newCar);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $newCar->setUser($user);


            $car = $this->getDoctrine()->getRepository(Car::class)->find($newCar->getCarId());

            $newCar->setUser($user);
            $em->persist($newCar);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('CarRegistration/carRegistration.html.twig', [
            'car_form' =>$form->createView()
        ]);
    }
}
