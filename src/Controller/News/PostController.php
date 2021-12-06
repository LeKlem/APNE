<?php

namespace App\Controller\News;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    
     #[Route('/news', name: 'news')]
    
    public function news(
        PostRepository $postRepository,
        PaginatorInterface $paginator,
        Request $request
     ): Response
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('App:Post')->getLastPost();

        $post = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('post/news.html.twig', [
            'post' => $post,
        ]);
    }
}
