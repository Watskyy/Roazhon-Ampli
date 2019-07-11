<?php

namespace App\Controller;

use App\Entity\Ampli;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AmpliController extends AbstractController
{
    /**
     * @Route("/ampli", name="ampli")
     */
    public function index()
    {
        $amplis = $this->getDoctrine()->getRepository(Ampli::class)->findAll();

        return $this->render('ampli/index.html.twig', [
            'amplis' => $amplis,
        ]);
    }
}
