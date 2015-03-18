<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sitemap
 *
 * @ORM\Table(name="sitemap")
 * @ORM\Entity
 */
class Sitemap
{
    /**
     * @var string
     *
     * @ORM\Column(name="changefreq", type="string", length=10, nullable=false)
     */
    private $changefreq;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="decimal", precision=2, scale=1, nullable=false)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="loc", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loc;



    /**
     * Set changefreq
     *
     * @param string $changefreq
     * @return Sitemap
     */
    public function setChangefreq($changefreq)
    {
        $this->changefreq = $changefreq;

        return $this;
    }

    /**
     * Get changefreq
     *
     * @return string 
     */
    public function getChangefreq()
    {
        return $this->changefreq;
    }

    /**
     * Set priority
     *
     * @param string $priority
     * @return Sitemap
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get loc
     *
     * @return string 
     */
    public function getLoc()
    {
        return $this->loc;
    }
}
