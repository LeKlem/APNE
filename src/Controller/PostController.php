<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    
     #[Route('/news', name: 'news')]
    
    public function news(PostRepository $postRepository ): Response
    {
        return $this->render('post/news.html.twig', [
            'post' => $postRepository -> findAll(),
        ]);
    }
}
