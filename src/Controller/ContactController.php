<?php

namespace App\Controller;
use App\Entity\ContactTicket;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 */
class ContactController extends AbstractController
{
    private $security;

    /**
     * @Route("/contact", name="contact")
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $form = $this->createForm(\TicketFormType::class);
        $entityManager = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $ContactTicket = new ContactTicket();
            $userID =  $this->get('security.token_storage')->getToken()->getUser();
            $ContactTicket->setTitle($data['Motif']);
            $ContactTicket->setContent($data['content']);
            $ContactTicket->setAuthorId($userID);
            $date = new DateTime(date('Y-m-d'));
            $ContactTicket->setDate($date);
            $entityManager->persist($ContactTicket);
            $entityManager->flush();
        }

        return $this->render('contact/page.html.twig', [
            'ticketForm'=>$form->CreateView()
        ]);
    }

}
