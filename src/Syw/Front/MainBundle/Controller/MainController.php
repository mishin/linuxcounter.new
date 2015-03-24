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

        return array('languages' => $languages);
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

        return array('languages' => $languages);
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

        return array('languages' => $languages);
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

        return array('languages' => $languages);
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

        return array('languages' => $languages);
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

        return array('languages' => $languages);
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
        $user->setLocale($locale);
        $userManager->updateUser($user);

        $this->get('session')->set('_locale', $user->getLocale());

        return $this->redirect($this->generateUrl('syw_front_main_main_index', array('_locale' => $locale)));

        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        return array('languages' => $languages);
    }
}
