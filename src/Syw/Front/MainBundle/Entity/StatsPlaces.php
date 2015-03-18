<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatsPlaces
 *
 * @ORM\Table(name="stats_places", indexes={@ORM\Index(name="stamp", columns={"stamp"}), @ORM\Index(name="code", columns={"code"})})
 * @ORM\Entity
 */
class StatsPlaces
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="stamp", type="integer", nullable=false)
     */
    private $stamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="hosts", type="integer", nullable=false)
     */
    private $hosts;

    /**
     * @var integer
     *
     * @ORM\Column(name="users", type="integer", nullable=false)
     */
    private $users;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set code
     *
     * @param string $code
     * @return StatsPlaces
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set stamp
     *
     * @param integer $stamp
     * @return StatsPlaces
     */
    public function setStamp($stamp)
    {
        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return integer 
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * Set hosts
     *
     * @param integer $hosts
     * @return StatsPlaces
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;

        return $this;
    }

    /**
     * Get hosts
     *
     * @return integer 
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Set users
     *
     * @param integer $users
     * @return StatsPlaces
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return integer 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
