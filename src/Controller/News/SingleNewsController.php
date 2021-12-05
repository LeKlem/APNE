<?php

namespace App\Controller\News;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class ProductController
 * @package App\Controller
 */
class SingleNewsController extends AbstractController
{
    /**
     * @Route("/news/{slug}", name="news.single")
     */
    public function detail(PostRepository $repo, String $slug, Request $request, SessionInterface $session): Response
    {
        $news = $repo->findOneBy(['slug' => $slug]);

        return $this->render('news/single.html.twig', [
            'post' => $news,
        ]);
    }

}
