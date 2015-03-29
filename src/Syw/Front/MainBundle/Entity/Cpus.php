<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cpus
 *
 * @ORM\Table(name="cpus", indexes={@ORM\Index(name="name", columns={"name"}), @ORM\Index(name="hertz", columns={"hertz"})})
 * @ORM\Entity
 */
class Cpus
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hertz", type="integer", nullable=false)
     */
    private $hertz;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     * @return Cpus
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
     * Set hertz
     *
     * @param integer $hertz
     * @return Cpus
     */
    public function setHertz($hertz)
    {
        $this->hertz = $hertz;

        return $this;
    }

    /**
     * Get hertz
     *
     * @return integer
     */
    public function getHertz()
    {
        return $this->hertz;
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
