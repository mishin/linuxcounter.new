<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translation
 *
 * @ORM\Table(name="translation")
 * @ORM\Entity
 */
class Translation
{
    /**
     * @var string
     *
     * @ORM\Column(name="translation", type="text", nullable=false)
     */
    private $translation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=false)
     */
    private $dateUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="trans_key", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $transKey;

    /**
     * @var string
     *
     * @ORM\Column(name="trans_locale", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $transLocale;

    /**
     * @var string
     *
     * @ORM\Column(name="message_domain", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $messageDomain;



    /**
     * Set translation
     *
     * @param string $translation
     * @return Translation
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Translation
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Translation
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set transKey
     *
     * @param string $transKey
     * @return Translation
     */
    public function setTransKey($transKey)
    {
        $this->transKey = $transKey;

        return $this;
    }

    /**
     * Get transKey
     *
     * @return string
     */
    public function getTransKey()
    {
        return $this->transKey;
    }

    /**
     * Set transLocale
     *
     * @param string $transLocale
     * @return Translation
     */
    public function setTransLocale($transLocale)
    {
        $this->transLocale = $transLocale;

        return $this;
    }

    /**
     * Get transLocale
     *
     * @return string
     */
    public function getTransLocale()
    {
        return $this->transLocale;
    }

    /**
     * Set messageDomain
     *
     * @param string $messageDomain
     * @return Translation
     */
    public function setMessageDomain($messageDomain)
    {
        $this->messageDomain = $messageDomain;

        return $this;
    }

    /**
     * Get messageDomain
     *
     * @return string
     */
    public function getMessageDomain()
    {
        return $this->messageDomain;
    }
}
