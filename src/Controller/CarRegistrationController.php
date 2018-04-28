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
        $user = $this->getUser();
        $newCar = new Car();
        $form = $this->createForm(CarForm::class, $newCar);
        $profile = $user->getProfileOfUser();
        $form->handleRequest($request);



        if($form->isSubmitted() && $form->isValid())
        {


            $newCar->setProfileOfUser($profile);

            $em = $this->getDoctrine()->getManager();
            $cars = $this->getDoctrine()->getRepository(Car::class)->find($newCar->getCarId());

            $em->persist($cars);
            $em->flush();



            return $this->redirectToRoute('homepage');
        }

        return $this->render('CarRegistration/carRegistration.html.twig', [
            'car_form' =>$form->createView()
        ]);
    }
}
