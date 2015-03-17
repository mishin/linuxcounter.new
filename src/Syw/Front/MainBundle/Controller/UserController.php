<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/login")
     * @Method("GET")
     *
     * @Template()
     */
    public function loginAction()
    {
        return array();
    }

    /**
     * @Route("/register")
     * @Method("GET")
     *
     * @Template()
     */
    public function registerAction()
    {
        return array();
    }
}
