<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\Product;
use App\Entity\ProductQuantity;
use App\Entity\StateKeys;
use App\Form\OrdersType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    private $security;
    /**
     * @Route ("/commande")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $form = $this -> createForm(OrdersType::class);
        $entityManager = $this->getDoctrine()->getManager();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $orders = new Orders();

            $state = new StateKeys();
            $state->setStateDef('En cours de traitement');

            $orders->setUser($this->get('security.token_storage')->getToken()->getUser());
            $orders->setState($state);
            $orders->setAdress($form->get('adress')->getData());
            $orders->setCity( $form->get('city')->getData());
            $orders->setPostalCode( $form->get('postal_code')->getData());

            $panier = $session->get('panier', []);

            foreach($panier as $products){
                $product = new ProductQuantity();
                $product->setOrders($orders->getId());
                $product->setProduct($this->getDoctrine()
                    ->getRepository(Product::class)
                    ->findOneBy(['id'=>$products['id']]));
                $product->setQuantity($products['quantity']);

            }
            $entityManager->persist($orders);
            $entityManager->flush();
            dump($orders);die;

            $session->clear('panier');
            return $this->redirectToRoute('/');

        }

        return $this->render('cart/commande.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
