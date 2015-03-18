<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Changelog
 *
 * @ORM\Table(name="changelog")
 * @ORM\Entity
 */
class Changelog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stamp", type="integer", nullable=false)
     */
    private $stamp;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=12, nullable=false)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="logentry", type="text", nullable=false)
     */
    private $logentry;

    /**
     * @var boolean
     *
     * @ORM\Column(name="twittered", type="boolean", nullable=false)
     */
    private $twittered;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set stamp
     *
     * @param integer $stamp
     * @return Changelog
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
     * Set version
     *
     * @param string $version
     * @return Changelog
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set logentry
     *
     * @param string $logentry
     * @return Changelog
     */
    public function setLogentry($logentry)
    {
        $this->logentry = $logentry;

        return $this;
    }

    /**
     * Get logentry
     *
     * @return string 
     */
    public function getLogentry()
    {
        return $this->logentry;
    }

    /**
     * Set twittered
     *
     * @param boolean $twittered
     * @return Changelog
     */
    public function setTwittered($twittered)
    {
        $this->twittered = $twittered;

        return $this;
    }

    /**
     * Get twittered
     *
     * @return boolean 
     */
    public function getTwittered()
    {
        return $this->twittered;
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
