<?php
namespace App\Controller;
use App\Entity\User;
use App\Form\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/", name="profile_index")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('homepage');
        }

        return $this->render('profile/index.html.twig',
            ['error' => null]);
    }

    /**
     * @Route("/{id}/edit", name="profile_edit")
     */
    public function edit(Request $request, User $user)
    {
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em ->flush();
            return $this->redirectToRoute('profile_index', ['id' => $user->getId()]);
        }
        return $this->render('profile/edit.html.twig', [
            'profile' => $user,
            'form' => $form->createView(),
        ]);
    }
}