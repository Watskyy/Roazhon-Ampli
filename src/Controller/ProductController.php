<?php

namespace App\Controller;

use App\Entity\Music;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $music = $this->getDoctrine()->getRepository(Music::class)->findAll();

        return $this->render('product/product.html.twig', [
            'controller_name' => 'ProductController',
            'music'=>$music
        ]);
    }
    public function show(Music $music){
        return $this->render('music/index.html.twig',
        [
            'music'=>$music
        ]);

    }
}
