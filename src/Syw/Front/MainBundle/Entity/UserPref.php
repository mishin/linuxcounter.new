<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPref
 *
 * @ORM\Table(name="user_pref", indexes={@ORM\Index(name="f_key", columns={"f_key", "variable"})})
 * @ORM\Entity
 */
class UserPref
{
    /**
     * @var integer
     *
     * @ORM\Column(name="f_key", type="integer", nullable=false)
     */
    private $fKey;

    /**
     * @var string
     *
     * @ORM\Column(name="variable", type="string", length=32, nullable=false)
     */
    private $variable;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=32, nullable=false)
     */
    private $value;

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
     * @return UserPref
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
     * Set variable
     *
     * @param string $variable
     * @return UserPref
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;

        return $this;
    }

    /**
     * Get variable
     *
     * @return string 
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return UserPref
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
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
