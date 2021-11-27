<?php

namespace App\Controller;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 */
class NewsListController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index()
    {

        $news = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findall();

        return $this->render('post/news.html.twig', [
            'news' => $news,
        ]);
    }

}
