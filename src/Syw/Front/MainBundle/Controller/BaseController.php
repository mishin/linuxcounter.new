<?php

namespace Syw\Front\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class BaseController
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
class BaseController extends Controller
{
    public function getGuessStats()
    {
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
        $popcont = file("../population.db");
        $popstr = trim($popcont[0]);
        $iustr = trim($popcont[1]);
        $tmp = explode("|", $popstr);
        $pop = (float)$tmp[0];
        $date = $tmp[1];
        $rate = (float)$tmp[2];
        $tmp = explode("/", $date);
        $day = intval($tmp[1]);
        $mon = intval($tmp[0]);
        $year = intval($tmp[2]);
        $oldts = gmmktime(0, 0, 0, $mon, $day, $year);
        $diff = time() - $oldts;
        $newhuman = $rate * $diff;
        $aktpop = $pop + $newhuman;
        $stats['world_population'] =   round($aktpop);
        $tmp = explode("|", $iustr);
        $iupop = intval($tmp[0]);
        $iudate = $tmp[1];
        $iurate = (float)$tmp[2];
        $tmp = explode("/", $iudate);
        $day = intval($tmp[1]);
        $mon = intval($tmp[0]);
        $year = intval($tmp[2]);
        $oldts = mktime(0, 0, 0, $mon, $day, $year);
        $diff = time() - $oldts;
        $newiusers = $iurate * $diff;
        $aktiusers = $iupop + $newiusers;
        $stats['world_internet_users'] =   round($aktiusers);
        $estimated_num_of_linux_users =   (($stats['world_internet_users'] / 100) * 2.55);
        $stats['guestimate_users'] =   $estimated_num_of_linux_users;
        return $stats;
    }
}
