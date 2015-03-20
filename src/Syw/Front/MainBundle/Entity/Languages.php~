<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Languages
 *
 * @ORM\Entity(repositoryClass="Syw\Front\MainBundle\Repository\LanguageRepository")
 * @UniqueEntity(fields="locale", message="Locale already exists.")
 * @ORM\Table(name="languages")
 */
class Languages
{
    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=7, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=128, nullable=false)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set locale
     *
     * @param string $locale
     * @return Languages
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Languages
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
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
