<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationBController extends AbstractController
{
    /**
     * @Route("/backoffice/home", name="home_backoffice")
     */
    public function index(): Response
    {
        return $this->render('backoffice/index.html.twig');
    }

    /**
     * @return Response
     * @Route("/backoffice/register", name="backoffice_register")
     */
    public function registration(){
        return $this->render('backoffice/register.html.twig');
    }
}
