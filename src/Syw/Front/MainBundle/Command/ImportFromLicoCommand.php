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

        $licotest = $this->getContainer()->get('doctrine')->getManager();
        $lico = $this->getContainer()->get('doctrine.dbal.lico_connection');
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

        if ($item == "users" || $item == "all") {
            $userManager = $this->getContainer()->get('fos_user.user_manager');


            $nums = $lico->fetchAll('SELECT COUNT(f_key) AS num FROM users');
            $numusers = $nums[0]['num'];
            $start = $numusers;
            $itemsperloop = 100;

            $z = 0;

            for ($a = $start; $a > 0; $a-=$itemsperloop) {
                unset($rows);
                $rows = $lico->fetchAll('SELECT * FROM users ORDER BY f_key LIMIT '.($a-$itemsperloop).','.$itemsperloop.'');
                foreach ($rows as $row) {
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

                    if ($sendmail === true) {
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

                        unset($user);
                        unset($userProfile);
                        unset($privacy);

                        gc_collect_cycles();
                    }


                    if ($sendmail === true) {
                        // NOTE: Email Versand wird nicht gemacht! Zu teuer und Gefahr für Blacklisting

                        $z++;
                        echo ">>>  $z \n";


                    }

                    gc_collect_cycles();
                }
                gc_collect_cycles();
            }
            gc_collect_cycles();
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
