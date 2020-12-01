<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\CarsController;

class CarsController extends AbstractController
{
    /**
     * @Route("/cars", name="cars_index")
     */
    public function index(CarsRepository $repo): Response
    {
        $carss = $repo->findAll();
        dump($repo);
        return $this->render('cars/index.html.twig', [
            'carss' => $carss,
        ]);
    }

    /**
     * Permet d'afficher une seule annonce
     * @Route("/cars/{id}", name="cars_show")
     *
     * @param [string] $id
     * @return Response
     */
    public function show(Cars $cars)
    {
      // $repo = $this->getDoctrine()->getRepository(Cars::class);
       //$cars = $repo->find($cars);
        //dump($cars);

        return $this->render('cars/show.html.twig',[
            'cars' => $cars
        ]);

    }
}
