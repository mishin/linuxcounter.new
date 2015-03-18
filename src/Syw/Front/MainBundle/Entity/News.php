<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stamp", type="integer", nullable=false)
     */
    private $stamp;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=250, nullable=false)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var boolean
     *
     * @ORM\Column(name="twittered", type="boolean", nullable=false)
     */
    private $twittered;

    /**
     * @var string
     *
     * @ORM\Column(name="seourl", type="string", length=255, nullable=false)
     */
    private $seourl;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set stamp
     *
     * @param integer $stamp
     * @return News
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
     * Set subject
     *
     * @param string $subject
     * @return News
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return News
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set twittered
     *
     * @param boolean $twittered
     * @return News
     */
    public function setTwittered($twittered)
    {
        $this->twittered = $twittered;

        return $this;
    }

    /**
     * Get twittered
     *
     * @return boolean 
     */
    public function getTwittered()
    {
        return $this->twittered;
    }

    /**
     * Set seourl
     *
     * @param string $seourl
     * @return News
     */
    public function setSeourl($seourl)
    {
        $this->seourl = $seourl;

        return $this;
    }

    /**
     * Get seourl
     *
     * @return string 
     */
    public function getSeourl()
    {
        return $this->seourl;
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
