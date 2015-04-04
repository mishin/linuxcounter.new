<?php

namespace Syw\Front\NewsBundle\Controller;

use BladeTester\LightNewsBundle\Controller\DefaultController as LightNewsDefaultController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends LightNewsDefaultController
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $manager = $this->getNewsManager();
        $news    = $manager->findAll();

        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }

        $metatitle = $this->get('translator')->trans('News and Announcements');
        $title = $metatitle;
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'news' => $news
        );
    }


    /**
     * @Template()
     */
    public function viewAction($id)
    {
        $manager = $this->getNewsManager();
        $news    = $manager->find($id);

        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }

        $metatitle = $news->getTitle();
        $title = $metatitle;
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'news' => $news
        );
    }

    private function getNewsManager()
    {
        return $this->get('blade_tester_light_news.news_manager');
    }
}
