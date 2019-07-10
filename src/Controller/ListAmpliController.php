<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListAmpliController extends AbstractController
{
    /**
     * @Route("/list/ampli", name="list_ampli")
     */
    public function index()
    {
        return $this->render('Ampli/liste-ampli.html.twig', [
            'controller_name' => 'ListAmpliController',
        ]);
    }
}
