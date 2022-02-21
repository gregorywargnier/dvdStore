<?php
namespace App\Controller\product;

use App\Repository\DvdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AllProductController extends AbstractController
{
    public function __invoke(Request $request, DvdRepository $dvdRepo): Response
    {
        $product = $dvdRepo->findAll();

        return $this->render('product/AllProduct.html.twig', [
            'product'=> $product,
            ]);

    }
}