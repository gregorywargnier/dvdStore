<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class homeController extends AbstractController
{
    public function __invoke(): Response
    {

        return $this->render('home/index.html.twig', []);
    }
}