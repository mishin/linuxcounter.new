<?php

namespace Syw\Front\MainBundle\Listener;

use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Syw\Front\MainBundle\Entity\Activity;

/**
 * Class Activity
 *
 * @category Listener
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class ActivityListener
{
    protected $context;
    protected $em;

    public function __construct(SecurityContext $context, Doctrine $doctrine)
    {
        $this->context = $context;
        $this->em = $doctrine->getEntityManager();
    }

    /**
     * On each request we want to update the user's last activity datetime
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event
     * @return void
     */
    public function onCoreController(FilterControllerEvent $event)
    {
        $user = $this->context->getToken()->getUser();
        if (false === isset($user) || false === is_object($user) || $user == null) {
            $user = null;
        }
        $route  = $event->getRequest()->attributes->get('_route');
        if (true === in_array($route, array('_wdt'))) {
            return true;
        }

        $activity = new Activity();
        $activity->setUser($user);
        $activity->setRoute($route);
        $activity->setCreatedAt(new \DateTime());
        $this->em->persist($activity);
        $this->em->flush();
    }
}