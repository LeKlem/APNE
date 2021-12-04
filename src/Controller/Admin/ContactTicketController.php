<?php

namespace App\Controller\Admin;
use App\Entity\ContactTicket;
use App\Repository\ContactTicketRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ButtonType;
/**
 * Class ContactTicketController
 * @package App\Controller
 */
class ContactTicketController extends AbstractController
{

        /**
         * @Route("App\Entity\ContactTicket", name="App\Entity\ContactTicket")
         * 
         */
        public function ContactTicket(
            ContactTicketRepository $ContactTicketRepository,
            PaginatorInterface $paginator,
            Request $request
         ): Response
        {
            $data = $ContactTicketRepository -> findAll();
            $ContactTicket = $paginator->paginate(
                $data,
                $request->query->getInt('page', 1),
                6
            );
            return $this->render('admin/ContactTicket.html.twig', [
                'ContactTicket' => $ContactTicket,
            ]);
        }

        
        public function update(int $id): Response
        {
            $entityManager = $this->getDoctrine()->getManager();
            $ContactTicket = $entityManager->getRepository(ContactTicket::class)->find($id);
    
            if (!$ContactTicket) {
                throw $this->createNotFoundException(
                    'No ContactTicket found for id '.$id
                );
            }
    
            $ContactTicket->setAdminId(0);
            $entityManager->flush();
    
            return $this->redirectToRoute('product_show', [
                'id' => $ContactTicket->getId()
            ]);
        }

}
