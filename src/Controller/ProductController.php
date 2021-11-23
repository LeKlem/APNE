<?php

namespace App\Controller;
use App\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product.detail")
     */
    public function detail(Product $product,Request $request, SessionInterface $session): Response
    {
        $form = $this->createFormBuilder()
            ->add('quantity', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new GreaterThan(0, null, 'Merci d\'entrer un nombre supérieur à 0.'),
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Ajouter au panier'])
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cart = $session->get('panier');
            if($cart == null)
                $cart = array();
            $cart[$product->getId()] = $form->getData()['quantity'];
            ksort($cart);
            $session->set('panier', $cart);
        }
        var_dump($session->get('panier'));
        return $this->render('product/detail.html.twig', [
                'product' => $product,
                'form' => $form->createView()
            ]);
        }

}
