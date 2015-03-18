<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimelineMails
 *
 * @ORM\Table(name="timeline_mails", indexes={@ORM\Index(name="p_key_f_key_type_f_ctime", columns={"p_key", "f_key", "f_ctime"})})
 * @ORM\Entity
 */
class TimelineMails
{
    /**
     * @var integer
     *
     * @ORM\Column(name="p_key", type="integer", nullable=false)
     */
    private $pKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer", nullable=false)
     */
    private $fKey;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text", nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_ctime", type="datetime", nullable=false)
     */
    private $fCtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set pKey
     *
     * @param integer $pKey
     * @return TimelineMails
     */
    public function setPKey($pKey)
    {
        $this->pKey = $pKey;

        return $this;
    }

    /**
     * Get pKey
     *
     * @return integer 
     */
    public function getPKey()
    {
        return $this->pKey;
    }

    /**
     * Set fKey
     *
     * @param integer $fKey
     * @return TimelineMails
     */
    public function setFKey($fKey)
    {
        $this->fKey = $fKey;

        return $this;
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

    /**
     * Set type
     *
     * @param string $type
     * @return TimelineMails
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set fCtime
     *
     * @param \DateTime $fCtime
     * @return TimelineMails
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
