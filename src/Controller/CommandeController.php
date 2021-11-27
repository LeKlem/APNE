<?php

namespace App\Controller;

use App\Form\OrdersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route ("/commande")
     */
    public function index(): Response
    {
        $form = $this -> createForm(OrdersType::class);
        return $this->render('cart/commande.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
