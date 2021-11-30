<?php

namespace App\Controller\Admin;


use App\Entity\Post;
use App\Entity\Product;
use App\Entity\ContactTicket;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('APNE');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Post', 'fas fa-news', Post::class);
        yield MenuItem::linkToCrud('Shop', 'fas fa-Product', Product::class);
        yield MenuItem::linktoRoute('ContactTicket', 'fas fa-ContactTicket', ContactTicket::class)->setPermission('ROLE_ADMIN');
    }
}
