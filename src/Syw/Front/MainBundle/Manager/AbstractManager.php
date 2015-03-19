<?php

namespace Syw\Front\MainBundle\Manager;

use Symfony\Component\DependencyInjection\ContainerInterface,
    Doctrine\ORM\EntityManager;

/**
 * AbstractManager manager class
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 * @package SywFrontMainBundle
 * @subpackage Manager
 */
abstract class AbstractManager
{
    /**
     * The service container
     *
     * @var \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    protected $container;

    /**
     * Set container property.
     *
     * @param  \Symfony\Component\DependencyInjection\ContainerInterface $container
     *
     * @return void
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get container property.
     *
     * @return \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Returns true if the service id is defined.
     *
     * @param  string  $id The service id
     *
     * @return Boolean true if the service id is defined, false otherwise
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * Gets a service by id.
     *
     * @param  string $id The service id
     *
     * @return object The service
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * Gets the entity manager.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->get('doctrine.orm.entity_manager');
    }

    /**
     * Gets a authenticated user object.
     *
     * @return null
     */
    public function getAuthenticatedUser()
    {
        $context = $this->get('security.context');

        if ($context->getToken() !== null) {
            return $context->getToken()->getUser();
        }

        return null;
    }
}
