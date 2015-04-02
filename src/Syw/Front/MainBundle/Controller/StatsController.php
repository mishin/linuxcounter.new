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
        $metatitle = $this->get('translator')->trans('General Statistics');
        $title = $metatitle;
        $languages = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:Languages')
            ->findBy(array('active' => 1), array('language' => 'ASC'));

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->getUser();
        } else {
            $user = null;
        }



        // Chart about User registrations per Day
        unset($data);
        $registrations = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:StatsRegistration')
            ->findBy(array(), array('day' => 'ASC'));
        foreach ($registrations as $reg) {
            $y = $reg->getDay()->format('Y');
            $m = $reg->getDay()->format('m');
            $d = $reg->getDay()->format('d');
            $data[] = array(
                (($reg->getDay()->format('U') + 86400) * 1000),
                $reg->getNum()
            );
        }
        $series = array(
            array(
                "type" => "area",
                "pointStart" => ((time() - (86400*30))*1000),
                "name" => $this->get('translator')->trans('Registrations'),
                "data" => $data
            )
        );
        $chart_registrations_per_day = new Highchart();
        $chart_registrations_per_day->chart->renderTo('chart_registrations_per_day');
        $chart_registrations_per_day->chart->zoomType('x');
        $chart_registrations_per_day->chart->type('area');
        $chart_registrations_per_day->title->text($this->get('translator')->trans('User registrations per day'));
        $chart_registrations_per_day->subtitle->text($this->get('translator')->trans('Click and drag in the plot area to zoom in'));
        $chart_registrations_per_day->xAxis->title(array('text'  => $this->get('translator')->trans('Date')));
        $chart_registrations_per_day->xAxis->type('datetime');
        $chart_registrations_per_day->xAxis->minRange(14 * 24 * 3600000);
        $chart_registrations_per_day->yAxis->title(array('text'  => $this->get('translator')->trans('User registrations per day')));
        $chart_registrations_per_day->legend->enabled(true);
        $chart_registrations_per_day->plotOptions->area(array(
            'allowPointSelect'  => true,
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $chart_registrations_per_day->series($series);
        // end of chart




        // Chart about Machine registrations per Day
        unset($data);
        $registrations = $this->get('doctrine')
            ->getRepository('SywFrontMainBundle:StatsMachines')
            ->findBy(array(), array('day' => 'ASC'));
        foreach ($registrations as $reg) {
            $y = $reg->getDay()->format('Y');
            $m = $reg->getDay()->format('m');
            $d = $reg->getDay()->format('d');
            $data[] = array(
                (($reg->getDay()->format('U') + 86400) * 1000),
                $reg->getNum()
            );
        }
        $series = array(
            array(
                "type" => "area",
                "pointStart" => ((time() - (86400*30))*1000),
                "name" => $this->get('translator')->trans('Registrations'),
                "data" => $data
            )
        );
        $chart_machines_per_day = new Highchart();
        $chart_machines_per_day->chart->renderTo('chart_machines_per_day');
        $chart_machines_per_day->chart->zoomType('x');
        $chart_machines_per_day->chart->type('area');
        $chart_machines_per_day->title->text($this->get('translator')->trans('Machine registrations per day'));
        $chart_machines_per_day->subtitle->text($this->get('translator')->trans('Click and drag in the plot area to zoom in'));
        $chart_machines_per_day->xAxis->title(array('text'  => $this->get('translator')->trans('Date')));
        $chart_machines_per_day->xAxis->type('datetime');
        $chart_machines_per_day->xAxis->minRange(14 * 24 * 3600000);
        $chart_machines_per_day->yAxis->title(array('text'  => $this->get('translator')->trans('Machine registrations per day')));
        $chart_machines_per_day->legend->enabled(true);
        $chart_machines_per_day->plotOptions->area(array(
            'allowPointSelect'  => true,
            'dataLabels'    => array('enabled' => false),
            'showInLegend'  => true
        ));
        $chart_machines_per_day->series($series);
        // end of chart











        $stats = array();
        $metatitle = $this->get('translator')->trans('General Statistics');
        $title = $metatitle;
        return array(
            'metatitle' => $metatitle,
            'title' => $title,
            'languages' => $languages,
            'user' => $user,
            'chart_registrations_per_day' => $chart_registrations_per_day,
            'chart_machines_per_day' => $chart_machines_per_day
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
}
