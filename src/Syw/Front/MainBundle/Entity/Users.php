<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="email", columns={"email"}), @ORM\Index(name="login", columns={"login"}), @ORM\Index(name="state", columns={"state"}), @ORM\Index(name="emailtime", columns={"emailtime"}), @ORM\Index(name="openid", columns={"openid"})})
 * @ORM\Entity
 */
class Users
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
     * @var \DateTime
     *
     * @ORM\Column(name="f_ctime", type="datetime", nullable=true)
     */
    private $fCtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_mtime", type="datetime", nullable=true)
     */
    private $fMtime;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=48, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=32, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="privacy", type="string", nullable=false)
     */
    private $privacy;

    /**
     * @var string
     *
     * @ORM\Column(name="credentials", type="string", length=128, nullable=false)
     */
    private $credentials;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logintime", type="datetime", nullable=false)
     */
    private $logintime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="emailtime", type="datetime", nullable=false)
     */
    private $emailtime;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var integer
     *
     * @ORM\Column(name="oldcounternum", type="integer", nullable=false)
     */
    private $oldcounternum;

    /**
     * @var string
     *
     * @ORM\Column(name="openid", type="string", length=255, nullable=false)
     */
    private $openid;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

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
     * @return Users
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
     * @return Users
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
     * Set fCtime
     *
     * @param \DateTime $fCtime
     * @return Users
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
     * Set fMtime
     *
     * @param \DateTime $fMtime
     * @return Users
     */
    public function setFMtime($fMtime)
    {
        $this->fMtime = $fMtime;

        return $this;
    }

    /**
     * Get fMtime
     *
     * @return \DateTime 
     */
    public function getFMtime()
    {
        return $this->fMtime;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
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
     * Set login
     *
     * @param string $login
     * @return Users
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Users
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set privacy
     *
     * @param string $privacy
     * @return Users
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

        return $this;
    }

    /**
     * Get privacy
     *
     * @return string 
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Set credentials
     *
     * @param string $credentials
     * @return Users
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * Get credentials
     *
     * @return string 
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Set logintime
     *
     * @param \DateTime $logintime
     * @return Users
     */
    public function setLogintime($logintime)
    {
        $this->logintime = $logintime;

        return $this;
    }

    /**
     * Get logintime
     *
     * @return \DateTime 
     */
    public function getLogintime()
    {
        return $this->logintime;
    }

    /**
     * Set emailtime
     *
     * @param \DateTime $emailtime
     * @return Users
     */
    public function setEmailtime($emailtime)
    {
        $this->emailtime = $emailtime;

        return $this;
    }

    /**
     * Get emailtime
     *
     * @return \DateTime 
     */
    public function getEmailtime()
    {
        return $this->emailtime;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Users
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set oldcounternum
     *
     * @param integer $oldcounternum
     * @return Users
     */
    public function setOldcounternum($oldcounternum)
    {
        $this->oldcounternum = $oldcounternum;

        return $this;
    }

    /**
     * Get oldcounternum
     *
     * @return integer 
     */
    public function getOldcounternum()
    {
        return $this->oldcounternum;
    }

    /**
     * Set openid
     *
     * @param string $openid
     * @return Users
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * Get openid
     *
     * @return string 
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
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
     * Get fKey
     *
     * @return integer 
     */
    public function getFKey()
    {
        return $this->fKey;
    }
}
