<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/contact")
     * @Method("GET")
     *
     * @Template()
     */
    public function contactAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/about")
     * @Method("GET")
     *
     * @Template()
     */
    public function aboutAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/download")
     * @Method("GET")
     *
     * @Template()
     */
    public function downloadAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/impressum")
     * @Method("GET")
     *
     * @Template()
     */
    public function impressumAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/support")
     * @Method("GET")
     *
     * @Template()
     */
    public function supportAction()
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return array('languages' => $languages, 'user' => $user);
    }

    /**
     * @Route("/lang")
     * @Method("POST")
     */
    public function langAction(Request $request)
    {
        $locale = $request->request->get('language');
        $userManager = $this->get('fos_user.user_manager');

        $user = $this->getUser();
        if (true === isset($user) && true === is_object($user)) {
            $user->setLocale($locale);
            $userManager->updateUser($user);
        } else {
            $user = null;
        }

        $this->get('session')->set('_locale', $locale);

        return $this->redirect($this->generateUrl('syw_front_main_main_index', array('_locale' => $locale)));

        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        return array('languages' => $languages, 'user' => $user);
    }
}
