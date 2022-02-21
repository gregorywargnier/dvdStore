<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\DvdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class homeController extends AbstractController
{
    public function __invoke(Request $request, CategoryRepository $categoryRepo,  DvdRepository $dvdRepo): Response
    {

        //for categories
        $categories = $categoryRepo->findBy([], [], 3);
        //for dvd
        $product = $dvdRepo->findBy([], [], 3);


        return $this->render('home/index.html.twig', [
            'categories'=> $categories,
            'product'=> $product,

        ]);
    }
}