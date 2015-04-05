<?php

namespace Syw\Front\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        $metatitle = "";
        $title = $metatitle;
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats,
            'name' => 'API Documentation'
        );
    }
}
