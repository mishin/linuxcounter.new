<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailcheck
 *
 * @ORM\Table(name="emailcheck", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="stamp", columns={"stamp"})})
 * @ORM\Entity
 */
class Emailcheck
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stamp", type="integer", nullable=false)
     */
    private $stamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer", nullable=false)
     */
    private $fKey;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $email;



    /**
     * Set stamp
     *
     * @param integer $stamp
     * @return Emailcheck
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
     * Set fKey
     *
     * @param integer $fKey
     * @return Emailcheck
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
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
