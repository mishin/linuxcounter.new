<?php

namespace Syw\Front\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Model\User;
use Syw\Front\MainBundle\Entity\StatsRegistration;

/**
 *
 */
class CreateRegistrationStatisticsCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('syw:statistics:registration')
            ->setDescription('Creates the statistics for registrations')
            ->setDefinition(array())
            ->setHelp(<<<EOT
The <info>syw:statistics:registration</info> command Creates the statistics for registrations.

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $db = $this->getContainer()->get('doctrine')->getManager();
        $qb = $db->createQueryBuilder();
        $qb->select('count(up.id)');
        $qb->from('SywFrontMainBundle:UserProfile', 'up');
        $uCount = $qb->getQuery()->getSingleScalarResult();
        $ipl   = 100;
        gc_collect_cycles();
        for ($start = 0; $start <  $uCount; $start+=$ipl) {
            $profiles = $db->getRepository('SywFrontMainBundle:UserProfile')->findBy(
                array(),
                array('createdAt' => 'ASC'),
                $ipl,
                $start
            );
            $range[0] = new \DateTime("1970-1-1 00:00:00");
            $range[1] = new \DateTime("1970-1-1 00:00:00");
            gc_collect_cycles();
            foreach ($profiles as $profile) {
                $createdAt = $profile->getCreatedAt();
                $rtmp = $this->monthRange($createdAt);
                $pexist = $db->getRepository('SywFrontMainBundle:StatsRegistration')->findOneBy(array('month' => $rtmp[0]));
                if (true === isset($pexist) && true === is_object($pexist)) {
                    $statsReg = $pexist;
                    $range = $rtmp;
                    unset($pexist);
                }
                if (($createdAt >= $range[0]) && ($createdAt <= $range[1])) {
                    $statsReg->setNum($statsReg->getNum() + 1);
                    continue;
                }
                if (true === isset($statsReg) && true === is_object($statsReg)) {
                    $db->persist($statsReg);
                    $db->flush();
                }
                unset($statsReg);
                $range    = $this->monthRange($createdAt);
                $statsReg = new StatsRegistration();
                $statsReg->setMonth($range[0]);
                $statsReg->setNum(1);
                $db->persist($statsReg);
                $db->flush();

                $pexist = null;
                unset($pexist);

                gc_collect_cycles();
            }
            $profiles = null;
            unset($profiles);
            gc_collect_cycles();
        }

        $db->clear();
        $db->close();

        $output->writeln(sprintf('Registration statistics created', ''));
    }

    protected function monthRange($date)
    {
        //First day of month
        $date->modify('first day of this month');
        $firstday = $date->format('Y-m-d 00:00:00');
        //Last day of month
        $date->modify('last day of this month');
        $lastday = $date->format('Y-m-d 23:59:59');

        return array(new \DateTime($firstday), new \DateTime($lastday));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {

    }
}
