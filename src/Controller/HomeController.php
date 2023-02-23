<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/shop', name: 'app_shop')]
    public function index1(): Response
    {
        return $this->render('shop/index.html.twig');

    }
    #[Route('/shop', name: 'app_shop')]
    public function index2(): Response
    {
        return $this->render('shop/index.html.twig');

    }
    #[Route('/shop', name: 'app_shop')]
    public function index3(): Response
    {
        return $this->render('shop/index.html.twig');

    }
}
