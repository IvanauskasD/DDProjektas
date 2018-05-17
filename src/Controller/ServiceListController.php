<?php
namespace App\Controller;

use App\Entity\Service;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ServiceListController extends Controller
{
    /**
     * @Route("/company/services", name="companyServices")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $services = $this->getDoctrine()->getManager()->getRepository(Service::class)->findByCompanyId($user->getId());
        return $this->render('serviceList.html.twig',[
            'services' => $services
        ]);
    }

    /**
     * @Route("/company/services/delete/{id}", name="deleteService")
     */
    public function Delete (int $id, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository(Service::class)->find($id);
        if ($service)
        {
            $em->remove($service);
            $em->flush();
        }
        $user = $this->getUser();
        $services = $this->getDoctrine()->getManager()->getRepository(Service::class)->findByCompanyId($user->getId());
        return $this->render('serviceList.html.twig',[
            'services' => $services
        ]);
    }
}
