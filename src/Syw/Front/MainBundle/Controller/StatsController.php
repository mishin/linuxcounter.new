<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StatsController extends BaseController
{
    /**
     * @Route("/statistics")
     * @Method("GET")
     *
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/statistics/guess")
     * @Method("GET")
     *
     * @Template()
     */
    public function guessAction()
    {
        return array();
    }
}
