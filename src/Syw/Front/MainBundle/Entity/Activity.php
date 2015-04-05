<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Activity
 *
 * @category Entity
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity
 */
class Activity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Syw\Front\MainBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Syw\Front\MainBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=true, onDelete="NO ACTION")
     * })
     */
    private $user;

    /**
     * @ORM\Column(name="route", type="string", length=128, nullable=false)
     */
    private $route;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Syw\Front\MainBundle\Entity\User $user
     * @return Activity
     */
    public function setUser(\Syw\Front\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Syw\Front\MainBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Activity
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Activity
     */
    public function setCreatedAt(\DateTime $createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdat;
    }
}
