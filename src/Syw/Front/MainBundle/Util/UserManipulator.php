<?php

namespace Syw\Front\MainBundle\Util;

use FOS\UserBundle\Model\UserManagerInterface;
use Syw\Front\MainBundle\Entity\UserProfile;

/**
 *
 */
class UserManipulator
{
    /**
     * User manager
     *
     * @var UserManagerInterface
     */
    private $userManager;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Creates a user and returns it.
     *
     * @param string  $username
     * @param string  $password
     * @param string  $email
     * @param string  $locale
     * @param Boolean $active
     * @param Boolean $superadmin
     *
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function create($username, $password, $email, $locale, $active, $superadmin)
    {
        $user = $this->userManager->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setLocale($locale);
        $user->setPlainPassword($password);
        $user->setEnabled((Boolean)$active);
        $user->setSuperAdmin((Boolean)$superadmin);
        $this->userManager->updateUser($user);

        /*
        $userProfile = new UserProfile();
        $userProfile->setUser($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($userProfile);
        $em->flush();

        $user->setProfile($userProfile);
        $this->userManager->updateUser($user);
        */

        return $user;
    }
}
