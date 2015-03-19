<?php

namespace Syw\Front\MainBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class PasswordResettingListener
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class LoginListener implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'onLoginSuccess',
        );
    }

    public function onLoginSuccess(FormEvent $event)
    {
        $this->get('session')->getFlashBag()->add('success', 'You have successfully logged in!');

    }
}