<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends BaseController
{
    /**
     * @Route("/")
     * @Method("GET")
     *
     * @Template()
     */
    public function indexAction()
    {

        return array();
    }

    /**
     * @Route("/contact")
     * @Method("GET")
     *
     * @Template()
     */
    public function contactAction()
    {
        return array();
    }

    /**
     * @Route("/about")
     * @Method("GET")
     *
     * @Template()
     */
    public function aboutAction()
    {
        return array();
    }

    /**
     * @Route("/download")
     * @Method("GET")
     *
     * @Template()
     */
    public function downloadAction()
    {
        return array();
    }

    /**
     * @Route("/impressum")
     * @Method("GET")
     *
     * @Template()
     */
    public function impressumAction()
    {
        return array();
    }

    /**
     * @Route("/support")
     * @Method("GET")
     *
     * @Template()
     */
    public function supportAction()
    {
        return array();
    }
}
