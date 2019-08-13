<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Calculator;



class DefaultController
{

    /**
     * @Route("/")
     *
     * 
     */
    public function index()
    {
        return new Response("hello world !");

    }


    /**
     * @Route("/article/{slug}")
     *
     */
    public function show($slug = "toto")
    {
        var_dump($slug);
        return new Response("je suis dans Article , show");
    }


    /**
     * @Route("/facture/{totalHt}/{taux}")
     *
     */
    public function facture(Calculator $calculator, $totalHt, $taux = 20)
    {
        $total = $calculator->getTotal($totalHt, $taux);

        return new response("Le total est $total");
    }



}


