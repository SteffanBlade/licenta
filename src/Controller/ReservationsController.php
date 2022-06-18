<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(\App\Repository\ReservationRepository $reservationRepository): Response
    {

        if(empty($this->getUser())){
            return $this->redirectToRoute("app_login");
        }

        return $this->render('reservations/index.html.twig', [
            'controller_name' => 'ReservationsController',
            'reservations' => $reservationRepository->findAll()
        ]);
    }
}
