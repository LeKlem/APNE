<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepage()
    {
        $news = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        return $this->render('home/page.html.twig',[
            'products' => $products,
            'news' => $news,
        ]);
         }
}