<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\User;
use App\Utils\Errors;
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

        $repository = $this->getDoctrine()->getRepository(User::class);
        $userExists = $repository->findBy(['email' => $company->getEmail()]);

        $repository = $this->getDoctrine()->getRepository(Company::class);
        $company1Exists = $repository->findBy(['email' => $company->getEmail()]);
        $company2Exists = $repository->findBy(['companyName' => $company->getCompanyName()]);

        if($form->isSubmitted() && $form->isValid() && !$userExists && !$company1Exists && !$company1Exists)
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




            return $this->redirectToRoute('login');
        }
        $error = array();
        $tried = false;
        if ($userExists || $company1Exists || $company2Exists)
        {
            if ($userExists || $company1Exists) array_push($error, "This email is already taken");
            if ($company2Exists) array_push($error, "This name is already taken");
            $tried = true;
        }
        return $this->render('Registration/registrationCompanies.html.twig', array('error' => $error, 'success' => false, 'tried' => $tried,
            'registration_form' => $form->createView()));
    }
}

