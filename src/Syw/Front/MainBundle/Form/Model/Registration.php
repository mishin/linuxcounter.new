<?php

namespace Syw\Front\MainBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Syw\Front\MainBundle\Entity\User;

/**
 * Class Registration
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class Registration
{
    /**
     * @Assert\Type(type="Syw\Front\MainBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}