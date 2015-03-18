<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="username_password", columns={"username", "password"}), @ORM\Index(name="id_password", columns={"id", "password"}), @ORM\Index(name="password_email", columns={"password", "email"}), @ORM\Index(name="ctime", columns={"ctime"}), @ORM\Index(name="activationkey", columns={"activationkey"}), @ORM\Index(name="cityid", columns={"cityid"}), @ORM\Index(name="income", columns={"income"}), @ORM\Index(name="religion", columns={"religion"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ctime", type="datetime", nullable=false)
     */
    private $ctime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mtime", type="datetime", nullable=false)
     */
    private $mtime;

    /**
     * @var string
     *
     * @ORM\Column(name="activationkey", type="string", length=32, nullable=false)
     */
    private $activationkey;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="cityid", type="integer", nullable=false)
     */
    private $cityid;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=false)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=64, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=64, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="displayname", type="string", length=128, nullable=false)
     */
    private $displayname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=false)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthplace", type="string", length=128, nullable=false)
     */
    private $birthplace;

    /**
     * @var integer
     *
     * @ORM\Column(name="income", type="integer", nullable=false)
     */
    private $income;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="string", length=64, nullable=false)
     */
    private $religion;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=255, nullable=false)
     */
    private $homepage;

    /**
     * @var string
     *
     * @ORM\Column(name="icq", type="string", length=15, nullable=false)
     */
    private $icq;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=64, nullable=false)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="jabber", type="string", length=255, nullable=false)
     */
    private $jabber;

    /**
     * @var string
     *
     * @ORM\Column(name="msn", type="string", length=255, nullable=false)
     */
    private $msn;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=false)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="google", type="string", length=255, nullable=false)
     */
    private $google;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=false)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="identica", type="string", length=255, nullable=false)
     */
    private $identica;

    /**
     * @var string
     *
     * @ORM\Column(name="interests", type="string", length=2500, nullable=false)
     */
    private $interests;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbies", type="string", length=2500, nullable=false)
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
     * Set ctime
     *
     * @param \DateTime $ctime
     * @return User
     */
    public function setCtime($ctime)
    {
        $this->ctime = $ctime;

        return $this;
    }

    /**
     * Get ctime
     *
     * @return \DateTime
     */
    public function getCtime()
    {
        return $this->ctime;
    }

    /**
     * Set mtime
     *
     * @param \DateTime $mtime
     * @return User
     */
    public function setMtime($mtime)
    {
        $this->mtime = $mtime;

        return $this;
    }

    /**
     * Get mtime
     *
     * @return \DateTime
     */
    public function getMtime()
    {
        return $this->mtime;
    }

    /**
     * Set activationkey
     *
     * @param string $activationkey
     * @return User
     */
    public function setActivationkey($activationkey)
    {
        $this->activationkey = $activationkey;

        return $this;
    }

    /**
     * Get activationkey
     *
     * @return string
     */
    public function getActivationkey()
    {
        return $this->activationkey;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set cityid
     *
     * @param integer $cityid
     * @return User
     */
    public function setCityid($cityid)
    {
        $this->cityid = $cityid;

        return $this;
    }

    /**
     * Get cityid
     *
     * @return integer
     */
    public function getCityid()
    {
        return $this->cityid;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     * @return User
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
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set birthplace
     *
     * @param string $birthplace
     * @return User
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    /**
     * Get birthplace
     *
     * @return string
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * Set income
     *
     * @param integer $income
     * @return User
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * Get income
     *
     * @return integer
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Set religion
     *
     * @param string $religion
     * @return User
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return string
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     * @return User
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
     * Set icq
     *
     * @param string $icq
     * @return User
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
     * @return User
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
     * Set jabber
     *
     * @param string $jabber
     * @return User
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
     * Set msn
     *
     * @param string $msn
     * @return User
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
     * Set facebook
     *
     * @param string $facebook
     * @return User
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
     * @return User
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
     * @return User
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
     * Set identica
     *
     * @param string $identica
     * @return User
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
     * Set interests
     *
     * @param string $interests
     * @return User
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
     * @return User
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
