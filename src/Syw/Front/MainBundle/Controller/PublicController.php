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
        $thismachines = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Machines')
            ->findBy(array('user' => $thisuser));
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }

        $metatitle = $this->get('translator')->trans('Public user profile page');
        $title = $metatitle;
        return $this->render('SywFrontMainBundle:Public:profile.html.twig', array(
            'metatitle' => $metatitle,
            'title' => $title,
            'thisuser' => $thisuser,
            'thisuserprofile' => $thisuserProfile,
            'thisprivacy' => $thisprivacy,
            'thismachines' => $thismachines,
            'language' => $language->getLanguage(),
            'languages' => $languages,
            'user' => $user
        ));
    }

    /**
     * @Route("/machine/{machinenumber}")
     * @Method("GET")
     *
     * @Template()
     */
    public function machineAction($machinenumber)
    {
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));
        $thismachine = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Machines')
            ->findOneBy(array('id' => $machinenumber));
        $thisuser = $thismachine->getUser();
        $thisuserprofile = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:UserProfile')
            ->findOneBy(array('user' => $thisuser));
        $locale = $thisuser->getLocale();
        $language = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findOneBy(array('locale' => $locale));
        $thisprivacy = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Privacy')
            ->findOneBy(array('user' => $thisuser));

        $seconds = $thismachine->getUptime();
        $uptime = gmdate("y n j G i s", $seconds);
        $uptimeDetail = explode(" ", $uptime);
        $years      = (string)($uptimeDetail[0]-70);
        $months     = (string)($uptimeDetail[1]-1);
        $days       = (string)($uptimeDetail[2]-1);
        $hours      = (string)$uptimeDetail[3];
        $minutes    = (string)$uptimeDetail[4];
        $seconds    = (string)$uptimeDetail[5];
        $uptime = "";
        if (intval($years) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= "$years years";
        }
        if (intval($months) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= "$months months";
        }
        if (intval($days) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= "$days days";
        }
        if (intval($hours) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= intval($hours)." hours";
        }
        if (intval($minutes) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= intval($minutes)." minutes";
        }
        if (intval($seconds) >= 1) {
            if (trim($uptime) != "") {
                $uptime .= ", ";
            }
            $uptime .= intval($seconds)." seconds";
        }

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $metatitle = $this->get('translator')->trans('Public machine profile page');
        $title = $metatitle;
        return $this->render('SywFrontMainBundle:Public:machine.html.twig', array(
            'metatitle' => $metatitle,
            'title' => $title,
            'thisuser' => $thisuser,
            'thisprivacy' => $thisprivacy,
            'thismachine' => $thismachine,
            'thisuserprofile' => $thisuserprofile,
            'uptime' => $uptime,
            'language' => $language,
            'languages' => $languages,
            'user' => $user
        ));
    }
}
