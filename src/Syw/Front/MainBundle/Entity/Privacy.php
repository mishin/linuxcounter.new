<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Privacy
 *
 * @ORM\Table(name="privacy", indexes={@ORM\Index(name="userid", columns={"userid"})})
 * @ORM\Entity
 */
class Privacy
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", nullable=false)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", nullable=false)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="google", type="string", nullable=false)
     */
    private $google;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", nullable=false)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="jabber", type="string", nullable=false)
     */
    private $jabber;

    /**
     * @var string
     *
     * @ORM\Column(name="icq", type="string", nullable=false)
     */
    private $icq;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", nullable=false)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="msn", type="string", nullable=false)
     */
    private $msn;

    /**
     * @var string
     *
     * @ORM\Column(name="identica", type="string", nullable=false)
     */
    private $identica;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", nullable=false)
     */
    private $homepage;

    /**
     * @var string
     *
     * @ORM\Column(name="displayname", type="string", nullable=false)
     */
    private $displayname;

    /**
     * @var string
     *
     * @ORM\Column(name="interests", type="string", nullable=false)
     */
    private $interests;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbies", type="string", nullable=false)
     */
    private $hobbies;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set userid
     *
     * @param integer $userid
     * @return Privacy
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Privacy
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     * @return Privacy
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Privacy
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Privacy
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set google
     *
     * @param string $google
     * @return Privacy
     */
    public function setGoogle($google)
    {
        $this->google = $google;

        return $this;
    }

    /**
     * Get google
     *
     * @return string 
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Privacy
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set jabber
     *
     * @param string $jabber
     * @return Privacy
     */
    public function setJabber($jabber)
    {
        $this->jabber = $jabber;

        return $this;
    }

    /**
     * Get jabber
     *
     * @return string 
     */
    public function getJabber()
    {
        return $this->jabber;
    }

    /**
     * Set icq
     *
     * @param string $icq
     * @return Privacy
     */
    public function setIcq($icq)
    {
        $this->icq = $icq;

        return $this;
    }

    /**
     * Get icq
     *
     * @return string 
     */
    public function getIcq()
    {
        return $this->icq;
    }

    /**
     * Set skype
     *
     * @param string $skype
     * @return Privacy
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string 
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set msn
     *
     * @param string $msn
     * @return Privacy
     */
    public function setMsn($msn)
    {
        $this->msn = $msn;

        return $this;
    }

    /**
     * Get msn
     *
     * @return string 
     */
    public function getMsn()
    {
        return $this->msn;
    }

    /**
     * Set identica
     *
     * @param string $identica
     * @return Privacy
     */
    public function setIdentica($identica)
    {
        $this->identica = $identica;

        return $this;
    }

    /**
     * Get identica
     *
     * @return string 
     */
    public function getIdentica()
    {
        return $this->identica;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     * @return Privacy
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return string 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     * @return Privacy
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname
     *
     * @return string 
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set interests
     *
     * @param string $interests
     * @return Privacy
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;

        return $this;
    }

    /**
     * Get interests
     *
     * @return string 
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Set hobbies
     *
     * @param string $hobbies
     * @return Privacy
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * Get hobbies
     *
     * @return string 
     */
    public function getHobbies()
    {
        return $this->hobbies;
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
