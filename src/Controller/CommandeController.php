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
    /**
     * @Route ("/commande")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param SessionInterface $session
     * @return Response
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
            
            $repository = $this->getDoctrine()->getManager()->getRepository(Product::class);

            foreach($panier as $id => $quantity){

                $current = $repository->find($id);

                $product = new ProductQuantity();
                $product->setOrders($orders);
                $product->setProduct($current);
                $product->setQuantity($quantity);

                $entityManager->persist($product);
                $entityManager->flush();
            }
            $entityManager->persist($orders);
            $entityManager->flush();

            return $this->redirectToRoute($this->renderView('home/page.html.twig'));

        }

        return $this->render('cart/commande.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
