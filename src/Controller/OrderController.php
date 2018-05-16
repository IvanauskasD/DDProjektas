<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Order;
use App\Entity\Service;
use App\Form\CarForm;

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
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }

        if(!$service = $this->getDoctrine()->getRepository(Service::class)->findAll())
        {
            return $this->redirectToRoute('homepage');
        }

        $user = $this->getUser();
        $cars = $user->getCars();
        $newCar = new Car();

        $services = $this->getDoctrine()->getRepository(Service::class)->findAll();
        $checkedBoxes = $request->get('student_ids');
        $orderTime = $request->get('chosenTime');

        $form = $this->createForm(CarForm::class, $newCar);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $orderDuration = 0;
            $ids = array();
            foreach ($checkedBoxes as $box)
            {
                $args = explode(";", $box);
                array_push($ids, $args[0]);
                $orderDuration += (int)$args[2];
            }

            $newOrder = new Order();

            $em = $this->getDoctrine()->getManager();

            $car = $this->getDoctrine()->getRepository(Car::class)->find($newCar->getCarId());

            if ($car)
            {
                $newCar = $car;
                $newOrder->getCar($newCar);
            } else
            {
                $newCar->setUser($user);
                $newOrder->setCar($newCar);
                $em->persist($newCar);
            }

            $startFinishTimes = explode("/", $orderTime);
            $startTime = new \DateTime($startFinishTimes[0]);
            $finishTime = new \DateTime($startFinishTimes[1]);
            $newOrder->setStartDate($startTime);
            $newOrder->setFinishDate($finishTime);
            $newOrder->setDuration($orderDuration);
            $newOrder->setUser($user);

            $em->persist($newOrder);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('order/index.html.twig', [
            'cars' => $cars,
            'form' => $form->createView(),
            'services' => $services,
        ]);
    }

    /**
     * @Route("/availableTimes", name="availableTimes")
     */
    public function availableTimes(Request $request)
    {
        if($request->isXmlHttpRequest() && $request->request->get('date'))
        {
            $date = $request->request->get('date');
            $duration = $request->request->get('duration');

            $time = array (8, 9, 10, 11, 12, 13, 14, 15, 16 ,17, 18);
            $orders = $this->getDoctrine()->getRepository(Order::class)->findBy($date);

            foreach ($orders as $order)
            {
                $startHour = $order->getStartDate()->format("H");
                $finishHour = $order->getFinishDate()->format("H");

                for ($i = (int)$startHour; $i < (int)$finishHour; $i++)
                {
                    $key = array_search($i, $time);
                    unset($time[$key]);
                }
            }

            $time = $this->findAvailableHours($duration, array_values($time));

            $arrData = ['time' => $time];
            return new JsonResponse($arrData);
        }
        return $this->redirectToRoute('homepage');
    }

    private function findAvailableHours($duration, $hours)
    {
        $availableHours = array();

        for ($i = 0; $i < count($hours); $i++)
        {
            $count = 0;
            for ($j = 0; $j < $duration; $j++)
            {
                if (array_search($hours[i]+$j, $hours) !== false)
                {
                    $count++;
                }
            }
            if ($count == $duration)
            {
                $data = $hours[$i] . ":00 - " . ($hours[$i]+$duration) . ":00";
                array_push($availableHours, $data);
            }
        }
        return $availableHours;
    }
}
