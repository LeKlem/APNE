<?php

namespace App\EventSubscriber;

use App\Entity\Product;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyShopSubscriber implements EventSubscriberInterface
{
    private $slugger;

    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class =>['setProductSlug'],
        ];
    }

    public function setProductSlug(BeforeEntityPersistedEvent $event)
    {
        $entity = $event ->getEntityInstance();
        if(!($entity instanceof Product)){
            return;
        }

        $slug = $this->slugger->slug($entity->getName());
        $entity->setSlug($slug);
    }
}

?>