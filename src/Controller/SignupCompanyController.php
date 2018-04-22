<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Component\HttpFoundation\Response;
use App\Events;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CompanyForm;

class SignupCompanyController extends AbstractController
{

    /**
     * @Route("/signupCompany", name="registrationCompany")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $company = new Company();

        $form = $this->createForm(CompanyForm::class, $company);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $password = $encoder
                ->encodePassword(
                    $company,
                    $company->getPlainPassword()
                );

            $company->setPassword($password);

            $em = $this->getDoctrine()->getManager();

            $em->persist($company);
            $em->flush();

            $registerToken = base64_encode(random_bytes(20));
            $registerToken = str_replace("/","",$registerToken);
            $company->setRegisterToken($registerToken);




            return $this->redirectToRoute('homepage');
        }

        return $this->render('Registration/registrationCompanies.html.twig', [
            'registration_form' => $form->createView(),
        ]);
    }
}
