<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use App\Repository\SeanceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonsController extends AbstractController
{
    #[Route('/lessons', name: 'app_lessons', methods: ['GET'])]
    public function index(SeanceRepository $seanceRepository, ReservationRepository $reservationRepository): Response
    {
        return $this->render('lessons/index.html.twig', [
            'controller_name' => 'LessonsController',
            'seances' => $seanceRepository->findAll(),
            'terrain' => $reservationRepository->findAll(),
        ]);
    }
}
