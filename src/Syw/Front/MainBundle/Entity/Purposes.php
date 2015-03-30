<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Purposes
 *
 * @ORM\Table(name="purposes", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Purposes
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="machinesnum", type="integer", length=11, nullable=true)
     */
    private $machinesnum;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set machinesnum
     *
     * @param integer $machinesnum
     * @return Architectures
     */
    public function setMachinesNum($machinesnum)
    {
        $this->machinesnum = $machinesnum;

        return $this;
    }

    /**
     * Get machinesnum
     *
     * @return integer
     */
    public function getMachinesNum()
    {
        return $this->machinesnum;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Purposes
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
