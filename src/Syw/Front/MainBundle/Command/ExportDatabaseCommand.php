<?php

namespace Syw\Front\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 */
class ExportDatabaseCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('syw:export:database')
            ->setDescription('Exports the database content to a file')
            ->setDefinition(array(
                new InputArgument('file', InputArgument::REQUIRED, 'The file')
            ))
            ->setHelp(<<<EOT
The <info>syw:export:database</info> command exports the database content to a file:

  <info>php app/console syw:export:database app/config/initial.sql</info>

This will export the database structure and data into the file app/config/initial.sql

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        $mysql_user     = $this->getContainer()->getParameter('database_user');
        $mysql_passwd   = $this->getContainer()->getParameter('database_password');
        $mysql_database = $this->getContainer()->getParameter('database_name');
        @exec('mysqldump -u'.$mysql_user.' -p'.$mysql_passwd.' --opt --quote-names --add-drop-table '.$mysql_database.' | sed "s/ AUTO_INCREMENT=[0-9]*\b//" > '.$file.'');
        @exec('sed "/^INSERT INTO \`fos_user\`.*$/d" -i '.$file.'');
        $output->writeln(sprintf('Database structure and data exported to <comment>%s</comment>', $file));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('file')) {
            $file = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please enter a filename:',
                function ($file) {
                    if (empty($file)) {
                        throw new \Exception('Filename can not be empty');
                    }

                    return $file;
                }
            );
            $input->setArgument('file', $file);
        }
    }
}
