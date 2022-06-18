<?php

namespace App\Controller;

use App\Entity\Reservation;
use DateInterval;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{

    /**
     * @throws \Exception
     */
    #[Route('/reservation/{id}', name: 'app_reservation')]
    public function index(\App\Repository\TableRepository $tableRepository, int $id, ManagerRegistry $doctrine): Response
    {

        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        $table = $tableRepository->find($id);
        $reservation = new Reservation();
        $reservation->addTable($table);
        $reservation->setPrice($table->getMinimalConsummation());
        $reservation->setStartHour(new \DateTime());

        $endHour = new \DateTime();
        $endHour->add(new DateInterval('PT1H'));
        $reservation->setEndTime($endHour);
        $doctrine->getManager()->persist($reservation);
        $doctrine->getManager()->flush();

       return $this->redirectToRoute("app_tables");
    }
}
