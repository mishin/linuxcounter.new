<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Languages
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 *
 * @ORM\Entity(repositoryClass="Syw\Front\MainBundle\Repository\LanguageRepository")
 * @UniqueEntity(fields="locale", message="Locale already exists.")
 * @ORM\Table(name="languages")
 */
class Languages
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=7)
     */
    protected $locale;

    /**
     * @ORM\Column(type="string", scale=128)
     */
    protected $language;

    public function getId() {
        return $this->id;
    }

    public function setLocale($locale) {
        $this->locale = $locale;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function getLanguage() {
        return $this->language;
    }
}
