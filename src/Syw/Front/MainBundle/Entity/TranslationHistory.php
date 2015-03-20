<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TranslationHistory
 *
 * @ORM\Table(name="translation_history", indexes={@ORM\Index(name="search_idx", columns={"trans_key", "trans_locale", "message_domain"})})
 * @ORM\Entity
 */
class TranslationHistory
{
    /**
     * @var string
     *
     * @ORM\Column(name="trans_key", type="string", length=255, nullable=false)
     */
    private $transKey;

    /**
     * @var string
     *
     * @ORM\Column(name="trans_locale", type="string", length=5, nullable=false)
     */
    private $transLocale;

    /**
     * @var string
     *
     * @ORM\Column(name="message_domain", type="string", length=255, nullable=false)
     */
    private $messageDomain;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_action", type="string", length=10, nullable=false)
     */
    private $userAction;

    /**
     * @var string
     *
     * @ORM\Column(name="translation", type="text", nullable=false)
     */
    private $translation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_change", type="datetime", nullable=false)
     */
    private $dateOfChange;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set transKey
     *
     * @param string $transKey
     * @return TranslationHistory
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
     * @return TranslationHistory
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
     * @return TranslationHistory
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

    /**
     * Set userName
     *
     * @param string $userName
     * @return TranslationHistory
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userAction
     *
     * @param string $userAction
     * @return TranslationHistory
     */
    public function setUserAction($userAction)
    {
        $this->userAction = $userAction;

        return $this;
    }

    /**
     * Get userAction
     *
     * @return string
     */
    public function getUserAction()
    {
        return $this->userAction;
    }

    /**
     * Set translation
     *
     * @param string $translation
     * @return TranslationHistory
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
     * Set dateOfChange
     *
     * @param \DateTime $dateOfChange
     * @return TranslationHistory
     */
    public function setDateOfChange($dateOfChange)
    {
        $this->dateOfChange = $dateOfChange;

        return $this;
    }

    /**
     * Get dateOfChange
     *
     * @return \DateTime
     */
    public function getDateOfChange()
    {
        return $this->dateOfChange;
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
