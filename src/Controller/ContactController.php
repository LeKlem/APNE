<?php

namespace App\Controller;
use App\Entity\ContactTicket;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * Class ProductController
 * @package App\Controller
 */
class ContactController extends AbstractController
{
    private $security;

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(\TicketFormType::class);
        $entityManager = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $ContactTicket = new ContactTicket();
            $userID =  $this->get('security.token_storage')->getToken()->getUser()->getId();
            $ContactTicket->setAdminId(1);
            $ContactTicket->setTitle($data['title']);
            $ContactTicket->setContent($data['content']);
            $ContactTicket->setAuthorId($userID);
            $ContactTicket->setDate(date('Y-m-d'));
            var_dump($ContactTicket);
            $entityManager->persist($ContactTicket);
        }

        return $this->render('contact/page.html.twig', [
            'ticketForm'=>$form->CreateView()
        ]);
    }

}
