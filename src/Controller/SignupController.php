<?php
// src/Controller/SignupController.php
namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use App\Events;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserForm;

class SignupController extends AbstractController
{

    /**
     * @Route("/register", name="registration")
     * @return Response
     */
    public function registerAction()
    {
        $user = new User();

        $form = $this->createForm(UserForm::class, $user);

        return $this->render('registration/registration.html.twig', [
            'registration_form' => $form->createView(),
        ]);
    }
}
