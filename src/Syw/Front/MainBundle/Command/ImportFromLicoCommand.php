<?php

namespace Syw\Front\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

        if ($item == "machines" || $item == "all") {
            $rows = $lico->fetchAll('SELECT * FROM machines ORDER BY id');
            foreach ($rows as $row) {
                $name = $row['name'];
                $obj = new \Syw\Front\MainBundle\Entity\Classes();
                $obj->setName($name);
                $licotest->persist($obj);
                $licotest->flush();
            }
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
