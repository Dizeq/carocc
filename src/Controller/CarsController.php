<?php

namespace App\Controller;

use App\Repository\CarsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarsController extends AbstractController
{
    /**
     * @Route("/cars", name="cars_index")
     */
    public function index(CarsRepository $repo): Response
    {
        $cars = $repo->findAll();
        return $this->render('cars/index.html.twig', [
            'cars' => '$cars',
        ]);
    }
}
