<?php

namespace Locals\UserBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\User\UserInterface;

class RegistrationEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var \FOS\UserBundle\Model\UserManagerInterface
     */
    protected $userManager;

    /**
     * @param \FOS\UserBundle\Model\UserManagerInterface $userManager
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager  = $userManager;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        );
    }

    /**
     * @param \FOS\UserBundle\Event\FormEvent $event
     */
    public function onRegistrationSuccess(FormEvent $event)
    {
        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();
        /** @var $form Symfony\Component\Form\FormInterface */
        $form = $event->getForm();
    }
}
