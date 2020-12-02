<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Image;
use App\Form\CarType;
use App\Controller\CarsController;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        $carss = $repo->findAll();
        dump($repo);
        return $this->render('cars/index.html.twig', [
            'carss' => $carss,
        ]);
    }
    /**
     * Permet de créer une annonce
     * @Route("/cars/new", name="cars_create")
     * 
     *
     * @return Response
     */
    public function create(EntityManagerInterface $manager, Request $request)
    {
        $cars = new Cars();
             

        $form = $this->createForm(CarType::class, $cars);

        $form->handleRequest($request);

        dump($cars);

        


        return $this->render('cars/new.html.twig',[
            'myForm' => $form->createView()
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
