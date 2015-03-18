<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimelineCommentLikes
 *
 * @ORM\Table(name="timeline_comment_likes", indexes={@ORM\Index(name="p_key", columns={"p_key"}), @ORM\Index(name="f_key_p_key", columns={"f_key", "p_key"}), @ORM\Index(name="f_key", columns={"f_key"})})
 * @ORM\Entity
 */
class TimelineCommentLikes
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
     * @return TimelineCommentLikes
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
     * @return TimelineCommentLikes
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
