<?php
namespace App\Controller\product;

use App\Entity\Dvd;
use App\Repository\DvdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OneProductController extends AbstractController
{
    public function __invoke(Dvd $dvd, DvdRepository $dvdRepo): Response
    {
        return $this->render('product/OneProduct.html.twig', [
            'dvd'=>$dvd,
        ]);

    }
}