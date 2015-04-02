<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cpus
 *
 * @ORM\Table(name="stats_registration", indexes={@ORM\Index(name="day", columns={"day"})})
 * @ORM\Entity
 */
class StatsRegistration
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="day", type="datetime", nullable=false)
     */
    private $day;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer", nullable=false)
     */
    private $num;


    /**
     * Set day
     *
     * @param \DateTime $day
     * @return StatsRegistration
     */
    public function setDay(\DateTime $day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \DateTime
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return StatsRegistration
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer
     */
    public function getNum()
    {
        return $this->num;
    }
}
