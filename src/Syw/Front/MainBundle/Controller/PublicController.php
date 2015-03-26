<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class PublicController
 *
 * @category Controller
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class PublicController extends BaseController
{
    /**
     * @Route("/user/{counternumber}")
     * @Method("GET")
     *
     * @Template()
     */
    public function profileAction($counternumber)
    {
        $thisuser =  $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:User')
            ->findOneBy(array('id' => $counternumber));
        $locale = $thisuser->getLocale();
        $thisuserProfile = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:UserProfile')
            ->findOneBy(array('user' => $thisuser));
        $language = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findOneBy(array('locale' => $locale));
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));
        $thisprivacy = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Privacy')
            ->findOneBy(array('user' => $thisuser));
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        return $this->render('SywFrontMainBundle:Public:profile.html.twig', array(
            'thisuser' => $thisuser,
            'thisuserprofile' => $thisuserProfile,
            'thisprivacy' => $thisprivacy,
            'language' => $language->getLanguage(),
            'languages' => $languages,
            'user' => $user
        ));
    }
}