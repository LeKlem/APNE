<?php

namespace App\Controller;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 */
class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session)
    {

        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(array('id' => array_keys( $session->get('panier', []))));

        return $this->render('cart/index.html.twig', [
            'quantity' => array_values($session->get('panier', [])),
            'products' => $products,
        ]);
    }

}
