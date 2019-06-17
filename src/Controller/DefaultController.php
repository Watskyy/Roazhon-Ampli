<?php

namespace App\Controller;

use App\Entity\Ampli;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $amplis = $this->getDoctrine()->getRepository(Ampli::class)->findAll();

        return $this->render('default/index.html.twig', [
            'amplis' => $amplis,
        ]);
    }
}
