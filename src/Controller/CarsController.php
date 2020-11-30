<?php

namespace App\Controller;

use App\Entity\Cars;
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

    /**
     * Permet d'afficher une seule annonce
     * @Route("/cars/{slug}", name="cars_show")
     *
     * @param [string] $slug
     * @return Response
     */
    public function show(Cars $car)
    {
        $repo = $this->getDoctrine()->getRepository(Cars::class);
        $car = $repo->findOneBySlug($slug);
        //dump($ad);

        return $this->render('cars/show.html.twig',[
            'cars' => $car
        ]);

    }
}
