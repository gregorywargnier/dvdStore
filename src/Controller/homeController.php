<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class homeController extends AbstractController
{
    public function __invoke(Request $request, CategoryRepository $categoryRepo): Response
    {
        $categories = $categoryRepo->findAll();
        return $this->render('home/index.html.twig', [
            'categories'=>$categories,
        ]);
    }
}