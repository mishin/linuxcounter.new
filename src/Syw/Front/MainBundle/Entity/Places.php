<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Places
 *
 * @ORM\Table(name="places", uniqueConstraints={@ORM\UniqueConstraint(name="nameindex", columns={"name"})}, indexes={@ORM\Index(name="code", columns={"code"})})
 * @ORM\Entity
 */
class Places
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="maintainer", type="integer", nullable=false)
     */
    private $maintainer;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=48, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="hostcount", type="integer", nullable=false)
     */
    private $hostcount;

    /**
     * @var string
     *
     * @ORM\Column(name="longname", type="string", length=128, nullable=false)
     */
    private $longname;

    /**
     * @var integer
     *
     * @ORM\Column(name="population", type="integer", nullable=false)
     */
    private $population;

    /**
     * @var integer
     *
     * @ORM\Column(name="users", type="integer", nullable=false)
     */
    private $users;

    /**
     * @var string
     *
     * @ORM\Column(name="html", type="text", nullable=true)
     */
    private $html;

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
     * @return Places
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
     * @return Places
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
     * Set name
     *
     * @param string $name
     * @return Places
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
     * Set maintainer
     *
     * @param integer $maintainer
     * @return Places
     */
    public function setMaintainer($maintainer)
    {
        $this->maintainer = $maintainer;

        return $this;
    }

    /**
     * Get maintainer
     *
     * @return integer 
     */
    public function getMaintainer()
    {
        return $this->maintainer;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Places
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
     * Set status
     *
     * @param string $status
     * @return Places
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set hostcount
     *
     * @param integer $hostcount
     * @return Places
     */
    public function setHostcount($hostcount)
    {
        $this->hostcount = $hostcount;

        return $this;
    }

    /**
     * Get hostcount
     *
     * @return integer 
     */
    public function getHostcount()
    {
        return $this->hostcount;
    }

    /**
     * Set longname
     *
     * @param string $longname
     * @return Places
     */
    public function setLongname($longname)
    {
        $this->longname = $longname;

        return $this;
    }

    /**
     * Get longname
     *
     * @return string 
     */
    public function getLongname()
    {
        return $this->longname;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return Places
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set users
     *
     * @param integer $users
     * @return Places
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
     * Set html
     *
     * @param string $html
     * @return Places
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return string 
     */
    public function getHtml()
    {
        return $this->html;
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
