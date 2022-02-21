<?php

namespace App\Controller\category;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AllCategoriesController extends AbstractController
{
    public function __invoke(Request $request, CategoryRepository $categoryRepo): Response
    {
        $categories = $categoryRepo->findAll();
        return $this->render('category/AllCategories.html.twig', [
            'categories'=> $categories,
        ]);
    }
}