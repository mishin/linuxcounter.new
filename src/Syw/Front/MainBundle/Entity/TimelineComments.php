<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimelineComments
 *
 * @ORM\Table(name="timeline_comments", indexes={@ORM\Index(name="f_key", columns={"f_key"}), @ORM\Index(name="p_key", columns={"p_key"}), @ORM\Index(name="f_ctime", columns={"f_ctime"}), @ORM\Index(name="p_key_f_ctime", columns={"p_key", "f_ctime"})})
 * @ORM\Entity
 */
class TimelineComments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer", nullable=false)
     */
    private $fKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="p_key", type="integer", nullable=false)
     */
    private $pKey;

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
     * @ORM\Column(name="posttext", type="string", length=2000, nullable=false)
     */
    private $posttext;

    /**
     * @var string
     *
     * @ORM\Column(name="linkinfo", type="string", length=1500, nullable=true)
     */
    private $linkinfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fKey
     *
     * @param integer $fKey
     * @return TimelineComments
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
     * Set pKey
     *
     * @param integer $pKey
     * @return TimelineComments
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
     * Set fCtime
     *
     * @param \DateTime $fCtime
     * @return TimelineComments
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
     * @return TimelineComments
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
     * Set posttext
     *
     * @param string $posttext
     * @return TimelineComments
     */
    public function setPosttext($posttext)
    {
        $this->posttext = $posttext;

        return $this;
    }

    /**
     * Get posttext
     *
     * @return string 
     */
    public function getPosttext()
    {
        return $this->posttext;
    }

    /**
     * Set linkinfo
     *
     * @param string $linkinfo
     * @return TimelineComments
     */
    public function setLinkinfo($linkinfo)
    {
        $this->linkinfo = $linkinfo;

        return $this;
    }

    /**
     * Get linkinfo
     *
     * @return string 
     */
    public function getLinkinfo()
    {
        return $this->linkinfo;
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
