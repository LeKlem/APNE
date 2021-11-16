<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;
    private $slugger;

    public function __construct(SluggerInterface $slugger, Security $security){
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class =>['setPostSlugAndDateAndUser'],
        ];
    }

    public function setPostSlugAndDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event ->getEntityInstance();
        if(!($entity instanceof Post)){
            return;
        }

        $slug = $this->slugger->slug($entity->getTitle());
        $entity->setSlug($slug);

        $now = new \DateTime('now');
        $entity -> setDate($now);

        $user = $this->security->getUser();
        $entity -> setAuthor($user);
    }
}

?>