<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persons
 *
 * @ORM\Table(name="persons", indexes={@ORM\Index(name="placeid", columns={"placeid"}), @ORM\Index(name="f_mtime", columns={"f_mtime"}), @ORM\Index(name="country", columns={"country", "name"}), @ORM\Index(name="f_ctime", columns={"f_ctime"})})
 * @ORM\Entity
 */
class Persons
{
    /**
     * @var string
     *
     * @ORM\Column(name="f_raw", type="text", nullable=true)
     */
    private $fRaw;

    /**
     * @var string
     *
     * @ORM\Column(name="f_clean", type="text", nullable=true)
     */
    private $fClean;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_ctime", type="datetime", nullable=true)
     */
    private $fCtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_mtime", type="datetime", nullable=true)
     */
    private $fMtime;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="placeid", type="string", length=64, nullable=false)
     */
    private $placeid;

    /**
     * @var string
     *
     * @ORM\Column(name="placesource", type="string", length=16, nullable=false)
     */
    private $placesource;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=64, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=2, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=255, nullable=false)
     */
    private $homepage;

    /**
     * @var string
     *
     * @ORM\Column(name="ident", type="string", length=75, nullable=false)
     */
    private $ident;

    /**
     * @var string
     *
     * @ORM\Column(name="may_publish", type="string", nullable=false)
     */
    private $mayPublish;

    /**
     * @var string
     *
     * @ORM\Column(name="method", type="string", length=6, nullable=false)
     */
    private $method;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started", type="datetime", nullable=false)
     */
    private $started;

    /**
     * @var string
     *
     * @ORM\Column(name="usage", type="string", length=256, nullable=true)
     */
    private $usage;

    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fKey;



    /**
     * Set fRaw
     *
     * @param string $fRaw
     * @return Persons
     */
    public function setFRaw($fRaw)
    {
        $this->fRaw = $fRaw;

        return $this;
    }

    /**
     * Get fRaw
     *
     * @return string 
     */
    public function getFRaw()
    {
        return $this->fRaw;
    }

    /**
     * Set fClean
     *
     * @param string $fClean
     * @return Persons
     */
    public function setFClean($fClean)
    {
        $this->fClean = $fClean;

        return $this;
    }

    /**
     * Get fClean
     *
     * @return string 
     */
    public function getFClean()
    {
        return $this->fClean;
    }

    /**
     * Set fCtime
     *
     * @param \DateTime $fCtime
     * @return Persons
     */
    public function setFCtime($fCtime)
    {
        $this->fCtime = $fCtime;

        return $this;
    }

    /**
     * Get fCtime
     *
     * @return \DateTime 
     */
    public function getFCtime()
    {
        return $this->fCtime;
    }

    /**
     * Set fMtime
     *
     * @param \DateTime $fMtime
     * @return Persons
     */
    public function setFMtime($fMtime)
    {
        $this->fMtime = $fMtime;

        return $this;
    }

    /**
     * Get fMtime
     *
     * @return \DateTime 
     */
    public function getFMtime()
    {
        return $this->fMtime;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Persons
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set placeid
     *
     * @param string $placeid
     * @return Persons
     */
    public function setPlaceid($placeid)
    {
        $this->placeid = $placeid;

        return $this;
    }

    /**
     * Get placeid
     *
     * @return string 
     */
    public function getPlaceid()
    {
        return $this->placeid;
    }

    /**
     * Set placesource
     *
     * @param string $placesource
     * @return Persons
     */
    public function setPlacesource($placesource)
    {
        $this->placesource = $placesource;

        return $this;
    }

    /**
     * Get placesource
     *
     * @return string 
     */
    public function getPlacesource()
    {
        return $this->placesource;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Persons
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Persons
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Persons
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persons
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     * @return Persons
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return string 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set ident
     *
     * @param string $ident
     * @return Persons
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;

        return $this;
    }

    /**
     * Get ident
     *
     * @return string 
     */
    public function getIdent()
    {
        return $this->ident;
    }

    /**
     * Set mayPublish
     *
     * @param string $mayPublish
     * @return Persons
     */
    public function setMayPublish($mayPublish)
    {
        $this->mayPublish = $mayPublish;

        return $this;
    }

    /**
     * Get mayPublish
     *
     * @return string 
     */
    public function getMayPublish()
    {
        return $this->mayPublish;
    }

    /**
     * Set method
     *
     * @param string $method
     * @return Persons
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string 
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set started
     *
     * @param \DateTime $started
     * @return Persons
     */
    public function setStarted($started)
    {
        $this->started = $started;

        return $this;
    }

    /**
     * Get started
     *
     * @return \DateTime 
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * Set usage
     *
     * @param string $usage
     * @return Persons
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * Get usage
     *
     * @return string 
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Get fKey
     *
     * @return integer 
     */
    public function getFKey()
    {
        return $this->fKey;
    }
}
