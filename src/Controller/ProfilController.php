<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route ("/profil")
     */
    public function profil()
    {
        $orders = $this->getDoctrine()->getRepository(Orders::class)->findBy(['user' => $this->getUser()]);
        $products =[];
        foreach ($orders as $order){
            foreach ($order->getProductQuantities() as $productQuantity)
            $products[] = ['order' => $order->getId(), 'product' => $productQuantity->getProduct(),'quantity'=>$productQuantity->getQuantity()];
        }
        return $this->render('profil/profil.html.twig',['products' => $products,'orders'=> $orders]);
    }
}