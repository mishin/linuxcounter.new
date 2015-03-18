<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Online
 *
 * @ORM\Table(name="online", indexes={@ORM\Index(name="ipaddress", columns={"ipaddress"}), @ORM\Index(name="stamp", columns={"stamp"}), @ORM\Index(name="key", columns={"key"})})
 * @ORM\Entity
 */
class Online
{
    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=16, nullable=false)
     */
    private $ipaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="browser", type="string", length=255, nullable=false)
     */
    private $browser;

    /**
     * @var integer
     *
     * @ORM\Column(name="key", type="integer", nullable=false)
     */
    private $key;

    /**
     * @var integer
     *
     * @ORM\Column(name="stamp", type="integer", nullable=false)
     */
    private $stamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     * @return Online
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string 
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set browser
     *
     * @param string $browser
     * @return Online
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set key
     *
     * @param integer $key
     * @return Online
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return integer 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set stamp
     *
     * @param integer $stamp
     * @return Online
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
