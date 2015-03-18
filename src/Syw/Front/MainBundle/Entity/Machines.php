<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Machines
 *
 * @ORM\Table(name="machines", indexes={@ORM\Index(name="isactive", columns={"isactive"}), @ORM\Index(name="owner", columns={"owner"}), @ORM\Index(name="update_key", columns={"update_key"})})
 * @ORM\Entity
 */
class Machines
{
    /**
     * @var string
     *
     * @ORM\Column(name="f_raw", type="text", nullable=false)
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
     * @ORM\Column(name="f_ctime", type="datetime", nullable=false)
     */
    private $fCtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_mtime", type="datetime", nullable=false)
     */
    private $fMtime;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner", type="integer", nullable=false)
     */
    private $owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpu", type="integer", nullable=false)
     */
    private $cpu;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpunum", type="integer", nullable=false)
     */
    private $cpunum;

    /**
     * @var integer
     *
     * @ORM\Column(name="accounts", type="integer", nullable=false)
     */
    private $accounts;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=2, nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="disk", type="bigint", nullable=false)
     */
    private $disk;

    /**
     * @var string
     *
     * @ORM\Column(name="distribution", type="string", length=128, nullable=false)
     */
    private $distribution;

    /**
     * @var string
     *
     * @ORM\Column(name="distversion", type="string", length=32, nullable=false)
     */
    private $distversion;

    /**
     * @var string
     *
     * @ORM\Column(name="mailer", type="string", length=64, nullable=false)
     */
    private $mailer;

    /**
     * @var integer
     *
     * @ORM\Column(name="memory", type="bigint", nullable=false)
     */
    private $memory;

    /**
     * @var string
     *
     * @ORM\Column(name="network", type="string", length=128, nullable=false)
     */
    private $network;

    /**
     * @var string
     *
     * @ORM\Column(name="purpose", type="string", length=174, nullable=false)
     */
    private $purpose;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=false)
     */
    private $source;

    /**
     * @var integer
     *
     * @ORM\Column(name="users", type="integer", nullable=false)
     */
    private $users;

    /**
     * @var string
     *
     * @ORM\Column(name="sysclass", type="string", length=32, nullable=false)
     */
    private $sysclass;

    /**
     * @var integer
     *
     * @ORM\Column(name="diskfree", type="bigint", nullable=false)
     */
    private $diskfree;

    /**
     * @var integer
     *
     * @ORM\Column(name="memfree", type="bigint", nullable=false)
     */
    private $memfree;

    /**
     * @var integer
     *
     * @ORM\Column(name="swap", type="bigint", nullable=false)
     */
    private $swap;

    /**
     * @var integer
     *
     * @ORM\Column(name="swapfree", type="bigint", nullable=false)
     */
    private $swapfree;

    /**
     * @var string
     *
     * @ORM\Column(name="cpuflags", type="text", nullable=false)
     */
    private $cpuflags;

    /**
     * @var string
     *
     * @ORM\Column(name="arch", type="string", length=16, nullable=false)
     */
    private $arch;

    /**
     * @var string
     *
     * @ORM\Column(name="kernel", type="string", length=24, nullable=false)
     */
    private $kernel;

    /**
     * @var string
     *
     * @ORM\Column(name="online", type="string", length=8, nullable=false)
     */
    private $online;

    /**
     * @var string
     *
     * @ORM\Column(name="uptime", type="string", length=15, nullable=false)
     */
    private $uptime;

    /**
     * @var string
     *
     * @ORM\Column(name="load", type="string", length=48, nullable=false)
     */
    private $load;

    /**
     * @var string
     *
     * @ORM\Column(name="update_key", type="string", length=32, nullable=false)
     */
    private $updateKey;

    /**
     * @var string
     *
     * @ORM\Column(name="publish_hostname", type="string", length=3, nullable=false)
     */
    private $publishHostname;

    /**
     * @var string
     *
     * @ORM\Column(name="publish_versions", type="string", length=3, nullable=false)
     */
    private $publishVersions;

    /**
     * @var string
     *
     * @ORM\Column(name="publish_cpuinfo", type="string", length=3, nullable=false)
     */
    private $publishCpuinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="publish_sizeinfo", type="string", length=3, nullable=false)
     */
    private $publishSizeinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="isactive", type="string", length=3, nullable=false)
     */
    private $isactive;

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
     * @return Machines
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
     * @return Machines
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
     * @return Machines
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
     * @return Machines
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
     * Set name
     *
     * @param string $name
     * @return Machines
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
     * Set owner
     *
     * @param integer $owner
     * @return Machines
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return integer 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set cpu
     *
     * @param integer $cpu
     * @return Machines
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return integer 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set cpunum
     *
     * @param integer $cpunum
     * @return Machines
     */
    public function setCpunum($cpunum)
    {
        $this->cpunum = $cpunum;

        return $this;
    }

    /**
     * Get cpunum
     *
     * @return integer 
     */
    public function getCpunum()
    {
        return $this->cpunum;
    }

    /**
     * Set accounts
     *
     * @param integer $accounts
     * @return Machines
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get accounts
     *
     * @return integer 
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Machines
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set disk
     *
     * @param integer $disk
     * @return Machines
     */
    public function setDisk($disk)
    {
        $this->disk = $disk;

        return $this;
    }

    /**
     * Get disk
     *
     * @return integer 
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * Set distribution
     *
     * @param string $distribution
     * @return Machines
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get distribution
     *
     * @return string 
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Set distversion
     *
     * @param string $distversion
     * @return Machines
     */
    public function setDistversion($distversion)
    {
        $this->distversion = $distversion;

        return $this;
    }

    /**
     * Get distversion
     *
     * @return string 
     */
    public function getDistversion()
    {
        return $this->distversion;
    }

    /**
     * Set mailer
     *
     * @param string $mailer
     * @return Machines
     */
    public function setMailer($mailer)
    {
        $this->mailer = $mailer;

        return $this;
    }

    /**
     * Get mailer
     *
     * @return string 
     */
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * Set memory
     *
     * @param integer $memory
     * @return Machines
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * Get memory
     *
     * @return integer 
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * Set network
     *
     * @param string $network
     * @return Machines
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Get network
     *
     * @return string 
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set purpose
     *
     * @param string $purpose
     * @return Machines
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string 
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Machines
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set users
     *
     * @param integer $users
     * @return Machines
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return integer 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set sysclass
     *
     * @param string $sysclass
     * @return Machines
     */
    public function setSysclass($sysclass)
    {
        $this->sysclass = $sysclass;

        return $this;
    }

    /**
     * Get sysclass
     *
     * @return string 
     */
    public function getSysclass()
    {
        return $this->sysclass;
    }

    /**
     * Set diskfree
     *
     * @param integer $diskfree
     * @return Machines
     */
    public function setDiskfree($diskfree)
    {
        $this->diskfree = $diskfree;

        return $this;
    }

    /**
     * Get diskfree
     *
     * @return integer 
     */
    public function getDiskfree()
    {
        return $this->diskfree;
    }

    /**
     * Set memfree
     *
     * @param integer $memfree
     * @return Machines
     */
    public function setMemfree($memfree)
    {
        $this->memfree = $memfree;

        return $this;
    }

    /**
     * Get memfree
     *
     * @return integer 
     */
    public function getMemfree()
    {
        return $this->memfree;
    }

    /**
     * Set swap
     *
     * @param integer $swap
     * @return Machines
     */
    public function setSwap($swap)
    {
        $this->swap = $swap;

        return $this;
    }

    /**
     * Get swap
     *
     * @return integer 
     */
    public function getSwap()
    {
        return $this->swap;
    }

    /**
     * Set swapfree
     *
     * @param integer $swapfree
     * @return Machines
     */
    public function setSwapfree($swapfree)
    {
        $this->swapfree = $swapfree;

        return $this;
    }

    /**
     * Get swapfree
     *
     * @return integer 
     */
    public function getSwapfree()
    {
        return $this->swapfree;
    }

    /**
     * Set cpuflags
     *
     * @param string $cpuflags
     * @return Machines
     */
    public function setCpuflags($cpuflags)
    {
        $this->cpuflags = $cpuflags;

        return $this;
    }

    /**
     * Get cpuflags
     *
     * @return string 
     */
    public function getCpuflags()
    {
        return $this->cpuflags;
    }

    /**
     * Set arch
     *
     * @param string $arch
     * @return Machines
     */
    public function setArch($arch)
    {
        $this->arch = $arch;

        return $this;
    }

    /**
     * Get arch
     *
     * @return string 
     */
    public function getArch()
    {
        return $this->arch;
    }

    /**
     * Set kernel
     *
     * @param string $kernel
     * @return Machines
     */
    public function setKernel($kernel)
    {
        $this->kernel = $kernel;

        return $this;
    }

    /**
     * Get kernel
     *
     * @return string 
     */
    public function getKernel()
    {
        return $this->kernel;
    }

    /**
     * Set online
     *
     * @param string $online
     * @return Machines
     */
    public function setOnline($online)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return string 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set uptime
     *
     * @param string $uptime
     * @return Machines
     */
    public function setUptime($uptime)
    {
        $this->uptime = $uptime;

        return $this;
    }

    /**
     * Get uptime
     *
     * @return string 
     */
    public function getUptime()
    {
        return $this->uptime;
    }

    /**
     * Set load
     *
     * @param string $load
     * @return Machines
     */
    public function setLoad($load)
    {
        $this->load = $load;

        return $this;
    }

    /**
     * Get load
     *
     * @return string 
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * Set updateKey
     *
     * @param string $updateKey
     * @return Machines
     */
    public function setUpdateKey($updateKey)
    {
        $this->updateKey = $updateKey;

        return $this;
    }

    /**
     * Get updateKey
     *
     * @return string 
     */
    public function getUpdateKey()
    {
        return $this->updateKey;
    }

    /**
     * Set publishHostname
     *
     * @param string $publishHostname
     * @return Machines
     */
    public function setPublishHostname($publishHostname)
    {
        $this->publishHostname = $publishHostname;

        return $this;
    }

    /**
     * Get publishHostname
     *
     * @return string 
     */
    public function getPublishHostname()
    {
        return $this->publishHostname;
    }

    /**
     * Set publishVersions
     *
     * @param string $publishVersions
     * @return Machines
     */
    public function setPublishVersions($publishVersions)
    {
        $this->publishVersions = $publishVersions;

        return $this;
    }

    /**
     * Get publishVersions
     *
     * @return string 
     */
    public function getPublishVersions()
    {
        return $this->publishVersions;
    }

    /**
     * Set publishCpuinfo
     *
     * @param string $publishCpuinfo
     * @return Machines
     */
    public function setPublishCpuinfo($publishCpuinfo)
    {
        $this->publishCpuinfo = $publishCpuinfo;

        return $this;
    }

    /**
     * Get publishCpuinfo
     *
     * @return string 
     */
    public function getPublishCpuinfo()
    {
        return $this->publishCpuinfo;
    }

    /**
     * Set publishSizeinfo
     *
     * @param string $publishSizeinfo
     * @return Machines
     */
    public function setPublishSizeinfo($publishSizeinfo)
    {
        $this->publishSizeinfo = $publishSizeinfo;

        return $this;
    }

    /**
     * Get publishSizeinfo
     *
     * @return string 
     */
    public function getPublishSizeinfo()
    {
        return $this->publishSizeinfo;
    }

    /**
     * Set isactive
     *
     * @param string $isactive
     * @return Machines
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return string 
     */
    public function getIsactive()
    {
        return $this->isactive;
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
