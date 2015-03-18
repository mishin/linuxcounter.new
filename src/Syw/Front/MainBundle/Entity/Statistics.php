<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistics
 *
 * @ORM\Table(name="statistics", indexes={@ORM\Index(name="name", columns={"name", "qualifier"})})
 * @ORM\Entity
 */
class Statistics
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
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="qualifier", type="string", length=64, nullable=false)
     */
    private $qualifier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

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
     * @return Statistics
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
     * @return Statistics
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
     * @return Statistics
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
     * Set qualifier
     *
     * @param string $qualifier
     * @return Statistics
     */
    public function setQualifier($qualifier)
    {
        $this->qualifier = $qualifier;

        return $this;
    }

    /**
     * Get qualifier
     *
     * @return string 
     */
    public function getQualifier()
    {
        return $this->qualifier;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Statistics
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Statistics
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
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
