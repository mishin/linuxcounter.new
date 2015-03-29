<?php

namespace Syw\Front\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Model\UserInterface;
use Syw\Front\MainBundle\Entity\UserProfile;

/**
 * Class ImportFromLicoCommand
 *
 * @category Command
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class ImportFromLicoCommand extends ContainerAwareCommand
{

    public $container;

    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('syw:import:lico')
            ->setDescription('Imports data from lico into licotest')
            ->setDefinition(array(
                new InputArgument('item', InputArgument::REQUIRED, 'the item to import')
            ))
            ->setHelp(<<<EOT
The <info>syw:import:lico</info> imports stuff from lico into licotest:

  <info>php app/console syw:import:lico machines</info>

This will export the data about machines from lico and import this to the tables in licotest

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $input->getArgument('item');

        $lico = $this->getContainer()->get('doctrine.dbal.lico_connection');
        $licotest = $this->getContainer()->get('doctrine')->getManager();
        $licotestdb = $this->getContainer()->get('doctrine.dbal.default_connection');

        if ($item == "processors" || $item == "all") {
            $rows = $lico->fetchAll('SELECT p.name, p.herz FROM processors p ORDER BY p.name ASC');
            foreach ($rows as $row) {
                $name = $row['name'];
                $hertz = $row['herz'];
                $obj = new \Syw\Front\MainBundle\Entity\Cpus();
                $obj->setName($name);
                $obj->setHertz($hertz);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "countries" || $item == "all") {
            $rows = $lico->fetchAll('SELECT p.name, p.code, p.population FROM places p ORDER BY p.name ASC');
            foreach ($rows as $row) {
                $name = $row['name'];
                $code = $row['code'];
                $population = $row['population'];
                $obj = new \Syw\Front\MainBundle\Entity\Countries();
                $obj->setName($name);
                $obj->setCode(strtolower($code));
                $obj->setPopulation($population);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "distributions" || $item == "all") {
            $rows = $lico->fetchAll('SELECT DISTINCT m.distribution AS name FROM machines m ORDER BY m.distribution');
            foreach ($rows as $row) {
                $name = $row['name'];
                $obj = new \Syw\Front\MainBundle\Entity\Distributions();
                $obj->setName($name);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "architectures" || $item == "all") {
            $rows = $lico->fetchAll('SELECT DISTINCT m.arch AS name FROM machines m ORDER BY m.arch');
            foreach ($rows as $row) {
                $name = $row['name'];
                $obj = new \Syw\Front\MainBundle\Entity\Architectures();
                $obj->setName($name);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "kernels" || $item == "all") {
            $rows = $lico->fetchAll('SELECT DISTINCT m.kernel AS name FROM machines m ORDER BY m.kernel');
            foreach ($rows as $row) {
                $name = $row['name'];
                $obj = new \Syw\Front\MainBundle\Entity\Kernels();
                $obj->setName($name);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "classes" || $item == "all") {
            $rows = $lico->fetchAll('SELECT DISTINCT m.sysclass AS name FROM machines m ORDER BY m.sysclass');
            foreach ($rows as $row) {
                $name = $row['name'];
                $obj = new \Syw\Front\MainBundle\Entity\Classes();
                $obj->setName($name);
                $licotest->persist($obj);
                $licotest->flush();
            }
        }

        if ($item == "purposes" || $item == "all") {
            $rows = $lico->fetchAll('SELECT DISTINCT m.purpose AS name FROM machines m ORDER BY m.purpose');
            foreach ($rows as $row) {
                $line = $row['name'];
                if (strpos($line, ",") !== false) {
                    $names = explode(",", trim($line));
                    foreach ($names as $name) {
                        $exists = false;
                        $exists = $licotest->getRepository('SywFrontMainBundle:Purposes')->findOneBy(array("name" => $name));
                        if (!$exists) {
                            $obj = new \Syw\Front\MainBundle\Entity\Purposes();
                            $obj->setName($name);
                            $licotest->persist($obj);
                            $licotest->flush();
                        }
                    }
                } else {
                    $exists = false;
                    $exists = $licotest->getRepository('SywFrontMainBundle:Purposes')->findOneBy(array("name" => $line));
                    if (!$exists) {
                        $obj = new \Syw\Front\MainBundle\Entity\Purposes();
                        $obj->setName($line);
                        $licotest->persist($obj);
                        $licotest->flush();
                    }
                }
            }
        }

        if ($item == "users") {
            @exec("php app/console syw:import:lico usersbg >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        }

        if ($item == "usersbg") {
            gc_collect_cycles();

            if (true === file_exists('import.db')) {
                $fp = fopen('import.db', "r");
                $data = fread($fp, 1024);
                fclose($fp);
                $fp = null;
                unset($fp);
                $dataar = explode(" ", trim($data));
                $start = intval(trim($dataar[0]));
                $counter = intval(trim($dataar[1]));
            } else {
                $nums     = $lico->fetchAll('SELECT COUNT(f_key) AS num FROM users');
                $numusers = $nums[0]['num'];
                $start    = $numusers;
                $counter  = 0;
            }
            $itemsperloop = 200;

            $z = 0;
            $a = $start;

            unset($rows);
            $rows = $lico->fetchAll('SELECT * FROM users ORDER BY f_key LIMIT '.($a-$itemsperloop).','.$itemsperloop.'');
            foreach ($rows as $row) {
                $counter++;
                gc_collect_cycles();
                $sendmail = false;
                $id        = $row['f_key'];
                $email     = $row['email'];

                if (preg_match("`^([a-z]{5,}[0-9]{2,}[\+]+[a-z0-9]{3,}@gmail\.com)$`i", strtolower($email))) {
                    continue;
                }

                if (preg_match("`^(.*[a-z]+\.[a-z]+\.[a-z0-9]+\.[a-z0-9]+.*@gmail\.com)$`i", strtolower($email))) {
                    continue;
                }

                $lastLogin = $row['logintime'];
                $username  = $id;
                $password = mt_rand(1000000000, 9999999999);

                $sendmail = true;

                $licotest = $this->getContainer()->get('doctrine')->getManager();
                $licotestdb = $this->getContainer()->get('doctrine.dbal.default_connection');

                $licotestdb->prepare('SET autocommit=0;')->execute();

                if ($sendmail === true) {
                    $userManager = $this->getContainer()->get('fos_user.user_manager');
                    $user = $userManager->createUser();
                    $user->setEnabled(true);
                    $user->setUsername($username);
                    $user->setEmail($email);
                    $user->setPlainPassword($password);
                    $user->setLastLogin(new \DateTime($lastLogin));
                    $user->setSuperAdmin(false);
                    $user->setLocale('en');
                    $userManager->updateUser($user);

                    $userid = $user->getId();
                    $licotestdb->query('UPDATE fos_user SET id=' . $id . ' WHERE id=\'' . $userid . '\'');

                    unset($user);
                    $user = $licotest->getRepository('SywFrontMainBundle:User')->findOneBy(array("id" => $id));

                    $userProfile = new UserProfile();
                    $userProfile->setUser($user);
                    $licotest->persist($userProfile);
                    $licotest->flush();
                    $user->setProfile($userProfile);
                    $userManager->updateUser($user);
                    $licotest->flush();

                    $userManager = null;
                    unset($userManager);
                    $userProfile = null;
                    unset($userProfile);

                    $privacy = new \Syw\Front\MainBundle\Entity\Privacy();
                    $privacy->setUser($user);
                    $privacy->setSecretProfile(0);
                    $privacy->setSecretCounterData(0);
                    $privacy->setSecretMachines(0);
                    $privacy->setSecretContactInfo(0);
                    $privacy->setSecretSocialInfo(0);
                    $privacy->setShowRealName(0);
                    $privacy->setShowEmail(0);
                    $privacy->setShowLocation(1);
                    $privacy->setShowHostnames(1);
                    $privacy->setShowKernel(1);
                    $privacy->setShowDistribution(1);
                    $privacy->setShowVersions(1);
                    $licotest->persist($privacy);
                    $licotest->flush();

                    $user = null;
                    unset($user);
                    $privacy = null;
                    unset($privacy);

                }

                $licotestdb->prepare('COMMIT;')->execute();
                $licotest->clear();

                gc_collect_cycles();

                $user = null;
                unset($user);
                $userProfile = null;
                unset($userProfile);
                $privacy = null;
                unset($privacy);
                $userid = null;
                unset($userid);
                $userManager = null;
                unset($userManager);

                $z++;

                // $mypid = getmypid();
                // $files = @exec('lsof -p '.$mypid.' | wc -l');
                // file_put_contents("import.log", ">>> ".$counter." | ".$z." | ".$id." |   open files: ".$files." | Memory info: ".number_format(round((memory_get_usage()/1000), 2))." Mb   (".number_format(round((memory_get_peak_usage()/1000), 2))." Mb) \n", FILE_APPEND);
                file_put_contents("import.log", ">>> ".$counter." | ".$z." | ".$id." \n", FILE_APPEND);

                gc_collect_cycles();
            }
            file_put_contents('import.db', ($a-$itemsperloop)." ".$counter);


            $licotest->clear();

            $licotest->close();
            $licotestdb->close();
            $lico->close();

            $licotest = null;
            unset($licotest);
            $licotestdb = null;
            unset($licotestdb);
            $lico = null;
            unset($lico);

            gc_collect_cycles();
            @exec("php app/console syw:import:lico users >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        }

        if ($item == "machines") {
            @exec("php app/console syw:import:lico machinesbg >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        }

        if ($item == "machinesbg") {
            gc_collect_cycles();

            if (true === file_exists('import.db')) {
                $fp = fopen('import.db', "r");
                $data = fread($fp, 1024);
                fclose($fp);
                $fp = null;
                unset($fp);
                $dataar = explode(" ", trim($data));
                $start = intval(trim($dataar[0]));
                $counter = intval(trim($dataar[1]));
            } else {
                $nums = $lico->fetchAll('SELECT COUNT(f_key) AS num FROM machines WHERE isactive=\'YES\'');
                $numusers = $nums[0]['num'];
                $start    = $numusers;
                $counter  = 0;
            }
            $itemsperloop = 200;

            $z = 0;
            $a = $start;

            unset($rows);
            $rows = $lico->fetchAll('SELECT * FROM machines ORDER BY f_key LIMIT '.($a-$itemsperloop).','.$itemsperloop.'');
            foreach ($rows as $row) {
                $counter++;
                $userid  = $row['owner'];
                $machineid = $row['f_key'];

                $licotestdb->prepare('SET autocommit=0;')->execute();
                $lico->prepare('SET autocommit=0;')->execute();

                $user = $licotest->getRepository('SywFrontMainBundle:User')->findOneBy(array("id" => $userid));

                $machine = new \Syw\Front\MainBundle\Entity\Machines();
                $machine->setUser($user);

                if (true === isset($row['update_key']) && trim($row['update_key']) != "") {
                    $machine->setUpdateKey(trim($row['update_key']));
                }
                if (true === isset($row['name']) && trim($row['name']) != "") {
                    $machine->setHostname(trim($row['name']));
                }
                if (true === isset($row['cpunum']) && trim($row['cpunum']) != "") {
                    $machine->setCores(trim($row['cpunum']));
                }
                if (true === isset($row['cpuflags']) && trim($row['cpuflags']) != "") {
                    $machine->setFlags(trim($row['cpuflags']));
                }
                if (true === isset($row['accounts']) && trim($row['accounts']) != "") {
                    $machine->setAccounts(trim($row['accounts']));
                }
                if (true === isset($row['disk']) && trim($row['disk']) != "") {
                    $machine->setDiskspace(trim($row['disk']));
                }
                if (true === isset($row['diskfree']) && trim($row['diskfree']) != "") {
                    $machine->setDiskspaceFree(trim($row['diskfree']));
                }
                if (true === isset($row['memory']) && trim($row['memory']) != "") {
                    $machine->setMemory(trim($row['memory']));
                }
                if (true === isset($row['memfree']) && trim($row['memfree']) != "") {
                    $machine->setMemoryFree(trim($row['memfree']));
                }
                if (true === isset($row['swap']) && trim($row['swap']) != "") {
                    $machine->setSwap(trim($row['swap']));
                }
                if (true === isset($row['swapfree']) && trim($row['swapfree']) != "") {
                    $machine->setSwapFree(trim($row['swapfree']));
                }
                if (true === isset($row['distversion']) && trim($row['distversion']) != "") {
                    $machine->setDistversion(trim($row['distversion']));
                }
                if (true === isset($row['mailer']) && trim($row['mailer']) != "") {
                    $machine->setMailer(trim($row['mailer']));
                }
                if (true === isset($row['network']) && trim($row['network']) != "") {
                    $machine->setNetwork(trim($row['network']));
                }
                if (true === isset($row['online']) && trim($row['online']) != "") {
                    if (trim($row['online']) == "online") {
                        $machine->setOnline(1);
                    } else {
                        $machine->setOnline(0);
                    }
                }
                if (true === isset($row['uptime']) && trim($row['uptime']) != "") {
                    $machine->setUptime(trim($row['uptime']));
                }
                if (true === isset($row['load']) && trim($row['load']) != "") {
                    $machine->setLoadAvg(trim($row['load']));
                }
                if (true === isset($row['f_ctime']) && trim($row['f_ctime']) != "") {
                    $machine->setCreatedAt(new \DateTime(trim($row['f_ctime'])));
                }
                if (true === isset($row['f_mtime']) && trim($row['f_mtime']) != "") {
                    $machine->setModifiedAt(new \DateTime(trim($row['f_mtime'])));
                }
                unset($obj);
                if (true === isset($row['distribution']) && trim($row['distribution']) != "") {
                    $obj = $licotest->getRepository('SywFrontMainBundle:Distributions')->findOneBy(array("name" => trim($row['distribution'])));
                    $machine->setDistribution($obj);
                }
                unset($obj);
                if (true === isset($row['kernel']) && trim($row['kernel']) != "") {
                    $obj = $licotest->getRepository('SywFrontMainBundle:Kernels')->findOneBy(array("name" => trim($row['kernel'])));
                    $machine->setKernel($obj);
                }
                unset($obj);
                if (true === isset($row['cpu']) && trim($row['cpu']) != "" && intval($row['cpu']) >= 1) {
                    $line = $lico->fetchAll('SELECT name, herz FROM processors WHERE f_key=\''.trim($row['cpu']).'\'');
                    $obj = $licotest->getRepository('SywFrontMainBundle:Cpus')->findOneBy(array("name" => trim($line[0]['name']), "hertz" => trim($line[0]['herz'])));
                    $machine->setCpu($obj);
                }
                unset($obj);
                if (true === isset($row['country']) && trim($row['country']) != "") {
                    $obj = $licotest->getRepository('SywFrontMainBundle:Countries')->findOneBy(array("code" => strtolower(trim($row['country']))));
                    $machine->setCountry($obj);
                }
                unset($obj);
                if (true === isset($row['arch']) && trim($row['arch']) != "") {
                    $obj = $licotest->getRepository('SywFrontMainBundle:Architectures')->findOneBy(array("name" => trim($row['arch'])));
                    $machine->setArchitecture($obj);
                }
                unset($obj);
                if (true === isset($row['sysclass']) && trim($row['sysclass']) != "") {
                    $obj = $licotest->getRepository('SywFrontMainBundle:Classes')->findOneBy(array("name" => trim($row['sysclass'])));
                    $machine->setClass($obj);
                }
                unset($obj);
                $licotest->persist($machine);
                $licotest->flush();

                $id = $machine->getId();
                $licotestdb->query('UPDATE machines SET id=' . $machineid . ' WHERE id=\'' . $id . '\'');

                unset($user);
                unset($machine);

                $lico->prepare('COMMIT;')->execute();
                $licotestdb->prepare('COMMIT;')->execute();

                $licotest->clear();

                gc_collect_cycles();

                $z++;
                $files = @exec('cat /proc/sys/fs/file-nr | cut -f 1');
                file_put_contents("import.log", ">>> ".$counter." | ".$z." | ".$machineid." |   open files: ".$files." | Memory info: ".number_format(round((memory_get_usage()/1000), 2))." Mb   (".number_format(round((memory_get_peak_usage()/1000), 2))." Mb) \n", FILE_APPEND);
            }
            gc_collect_cycles();
            file_put_contents('import.db', ($a-$itemsperloop)." ".$counter);
            gc_collect_cycles();
            @exec("php app/console syw:import:lico machines >>import.log 2>&1 3>&1 4>&1 &");
            exit(0);
        }



















        $output->writeln(sprintf('Data of <comment>%s</comment> imported', $item));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('item')) {
            $item = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please enter a item:',
                function ($item) {
                    if (empty($item)) {
                        throw new \Exception('item can not be empty');
                    }

                    return $item;
                }
            );
            $input->setArgument('item', $item);
        }
    }
}
