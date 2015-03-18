<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Processors
 *
 * @ORM\Table(name="processors", indexes={@ORM\Index(name="name", columns={"name"}), @ORM\Index(name="herz", columns={"herz"})})
 * @ORM\Entity
 */
class Processors
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="herz", type="string", length=12, nullable=false)
     */
    private $herz;

    /**
     * @var integer
     *
     * @ORM\Column(name="machines", type="integer", nullable=false)
     */
    private $machines;

    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fKey;



    /**
     * Set name
     *
     * @param string $name
     * @return Processors
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
     * Set herz
     *
     * @param string $herz
     * @return Processors
     */
    public function setHerz($herz)
    {
        $this->herz = $herz;

        return $this;
    }

    /**
     * Get herz
     *
     * @return string 
     */
    public function getHerz()
    {
        return $this->herz;
    }

    /**
     * Set machines
     *
     * @param integer $machines
     * @return Processors
     */
    public function setMachines($machines)
    {
        $this->machines = $machines;

        return $this;
    }

    /**
     * Get machines
     *
     * @return integer 
     */
    public function getMachines()
    {
        return $this->machines;
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
