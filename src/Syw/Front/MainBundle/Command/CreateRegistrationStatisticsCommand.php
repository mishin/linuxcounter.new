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
            ->setDefinition(array(
                new InputArgument('item', InputArgument::REQUIRED, 'the item to import')
            ))
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
        $item = $input->getArgument('item');

        $lico       = $this->getContainer()->get('doctrine.dbal.lico_connection');
        $licotest   = $this->getContainer()->get('doctrine')->getManager();
        $licotestdb = $this->getContainer()->get('doctrine.dbal.default_connection');
        $db = $this->getContainer()->get('doctrine')->getManager();

        if ($item == "start") {
            @exec("php app/console syw:statistics:registration continue >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        } else if ($item == "continue") {
            if (true === file_exists('import.db')) {
                $fp   = fopen('import.db', "r");
                $data = fread($fp, 1024);
                fclose($fp);
                $fp = null;
                unset($fp);
                $dataar  = explode(" ", trim($data));
                $start   = intval(trim($dataar[0]));
                $counter = intval(trim($dataar[1]));
            } else {
                $nums     = $licotestdb->fetchAll('SELECT COUNT(id) AS num FROM user_profile');
                $numusers = $nums[0]['num'];
                $start    = 0; // $numusers;
                $counter  = 0;
            }
            $itemsperloop = 200;

            $z = 0;
            $a = $start;

            unset($rows);
            $rows = $licotestdb->fetchAll('SELECT created_at FROM user_profile ORDER BY created_at LIMIT ' . $a . ',' . $itemsperloop . '');
            foreach ($rows as $row) {
                $counter++;

                $range = null;
                unset($range);
                $range[0] = new \DateTime("1970-1-1 00:00:00");
                $range[1] = new \DateTime("1970-1-1 00:00:00");
                gc_collect_cycles();
                $createdAt = new \DateTime($row['created_at']);
                $rtmp = $this->monthRange($createdAt);
                $pexist = $db->getRepository('SywFrontMainBundle:StatsRegistration')->findOneBy(array('month' => $rtmp[0]));

                if (true === isset($pexist) && true === is_object($pexist)) {
                    $statsReg = $pexist;
                    $range = $rtmp;
                    $pexist = null;
                    unset($pexist);
                }
                if (($createdAt >= $range[0]) && ($createdAt <= $range[1])) {
                    $statsReg->setNum($statsReg->getNum() + 1);
                    $db->persist($statsReg);
                    $db->flush();
                    $counter++;
                    $mypid = getmypid();
                    $files = @exec('lsof -p '.$mypid.' | wc -l');
                    file_put_contents("import.log", ">>> ".$counter." | ".$range[0]->format('Y-m-d')." | open files: ".$files." | Memory info: ".number_format(round((memory_get_usage()/1000), 2))." Mb   (".number_format(round((memory_get_peak_usage()/1000), 2))." Mb) \n", FILE_APPEND);
                    continue;
                }
                $statsReg = null;
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
                $mypid = getmypid();
                $files = @exec('lsof -p '.$mypid.' | wc -l');
                file_put_contents("import.log", ">>> ".$counter." | ".$range[0]->format('Y-m-d')." | open files: ".$files." | Memory info: ".number_format(round((memory_get_usage()/1000), 2))." Mb   (".number_format(round((memory_get_peak_usage()/1000), 2))." Mb) \n", FILE_APPEND);
                gc_collect_cycles();
            }

            $db->clear();
            $db->close();
            file_put_contents('import.db', ($a + $itemsperloop) . " " . $counter);
            @exec("php app/console syw:statistics:registration start >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        }

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
