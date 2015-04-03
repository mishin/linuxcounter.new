<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ob\HighchartsBundle\Highcharts\Highchart;

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
        $metatitle = $this->get('translator')->trans('Statistics mainpage');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/guess")
     * @Method("GET")
     *
     * @Template()
     */
    public function guessAction()
    {
        $metatitle = $this->get('translator')->trans('Our Guess about the Linux Users worldwide');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/users")
     * @Method("GET")
     *
     * @Template()
     */
    public function usersAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the Linux users');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/machines")
     * @Method("GET")
     *
     * @Template()
     */
    public function machinesAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the Linux machines');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/distributions")
     * @Method("GET")
     *
     * @Template()
     */
    public function distributionsAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the Linux distributions');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/kernels")
     * @Method("GET")
     *
     * @Template()
     */
    public function kernelsAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the Linux kernels');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/uptimes")
     * @Method("GET")
     *
     * @Template()
     */
    public function uptimesAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the machine uptimes');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }
        $stats = array();
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'stats' => $stats
        );
    }

    /**
     * @Route("/statistics/counter")
     * @Method("GET")
     *
     * @Template()
     */
    public function counterAction()
    {
        $metatitle = $this->get('translator')->trans('Statistics about the Linux Counter itself');
        $title1 = $metatitle;
        $title2 = $this->get('translator')->trans('Statistics about the registrations');
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }

        $em = $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->select('count(user.id)');
        $qb->from('SywFrontMainBundle:User', 'user');
        $uCount = $qb->getQuery()->getSingleScalarResult();
        $stats['usernum'] = $uCount;

        $qb = $em->createQueryBuilder();
        $qb->select('count(machines.id)');
        $qb->from('SywFrontMainBundle:Machines', 'machines');
        $mCount = $qb->getQuery()->getSingleScalarResult();
        $stats['machinenum'] = $mCount;

        $mostcity = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Cities')
            ->findBy(
                array(),
                array('usernum' => 'DESC'),
                1,
                0
            );
        $stats['mostcity'] = $mostcity[0]->getName();
        $stats['cityusernum'] = $mostcity[0]->getUserNum();
        $code = $mostcity[0]->getIsoCountryCode();
        $country = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Countries')
            ->findOneBy(array('code' => strtolower($code)));
        $stats['citycountry'] = $country->getName();

        // Chart about User registrations per Month
        unset($data1);
        $registrations = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:StatsMachines')
            ->findBy(array(), array('month' => 'ASC'));
        foreach ($registrations as $reg) {
            $y = $reg->getMonth()->format('Y');
            $m = $reg->getMonth()->format('m');
            $d = $reg->getMonth()->format('d');
            $data1[] = array(
                (($reg->getMonth()->format('U') + 86400) * 1000),
                $reg->getNum()
            );
        }
        unset($data2);
        $registrations = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:StatsRegistration')
            ->findBy(array(), array('month' => 'ASC'));
        foreach ($registrations as $reg) {
            $y = $reg->getMonth()->format('Y');
            $m = $reg->getMonth()->format('m');
            $d = $reg->getMonth()->format('d');
            $data2[] = array(
                (($reg->getMonth()->format('U') + 86400) * 1000),
                $reg->getNum()
            );
        }
        $series = array(
            array(
                "name" => $this->get('translator')->trans('User Registrations'),
                "data" => $data2
            ),
            array(
                "name" => $this->get('translator')->trans('Machine Registrations'),
                "data" => $data1
            )
        );
        $chart_registrations_per_month = new Highchart();
        $chart_registrations_per_month->chart->renderTo('chart_registrations_per_month');
        $chart_registrations_per_month->chart->zoomType('x');
        $chart_registrations_per_month->chart->type('line');
        $chart_registrations_per_month->title->text($this->get('translator')->trans('Registrations per month'));
        $chart_registrations_per_month->subtitle->text($this->get('translator')->trans('Click and drag in the plot area to zoom in'));
        $chart_registrations_per_month->xAxis->title(array('text'  => $this->get('translator')->trans('Date')));
        $chart_registrations_per_month->xAxis->type('datetime');
        $chart_registrations_per_month->xAxis->minRange(14 * 24 * 3600000 * 30); // 14 Monate
        $chart_registrations_per_month->yAxis->min(0);
        $chart_registrations_per_month->yAxis->title(array('text'  => $this->get('translator')->trans('Registrations per month')));
        $chart_registrations_per_month->legend->enabled(true);
        $chart_registrations_per_month->plotOptions->area(array(
            'allowPointSelect'  => true,
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $chart_registrations_per_month->series($series);
        // end of chart

        return array(
            'metatitle' => $metatitle,
            'title1' => $title1,
            'title2' => $title2,
            'languages' => $languages,
            'stats' => $stats,
            'user' => $user,
            'chart' => $chart_registrations_per_month
        );
    }
}
