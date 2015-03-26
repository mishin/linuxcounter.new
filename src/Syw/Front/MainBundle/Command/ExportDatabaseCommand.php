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
            ->setDescription('Exports a database table to a directory')
            ->setDefinition(array(
                new InputArgument('folder', InputArgument::REQUIRED, 'The folder')
            ))
            ->setHelp(<<<EOT
The <info>syw:export:database</info> command exports the database content to a folder:

  <info>php app/console syw:export:database app/config/travis-sql</info>

This will export the database structure and data into the folder app/config/travis-sql

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $folder = $input->getArgument('folder');

        $mysql_user     = $this->getContainer()->getParameter('database_user');
        $mysql_passwd   = $this->getContainer()->getParameter('database_password');
        $mysql_database = $this->getContainer()->getParameter('database_name');

        $tables = array();
        @exec('mysql -u'.$mysql_user.' -p'.$mysql_passwd.' '.$mysql_database.' -e \'SHOW TABLES;\'', $tables);
        for ($a=1; $a<count($tables); $a++) {
            if ($tables[$a] != "cities") {
                @exec('mysqldump -u' . $mysql_user . ' -p' . $mysql_passwd . ' --opt --quote-names --add-drop-table ' . $mysql_database . ' ' . $tables[$a] . ' | sed "s/ AUTO_INCREMENT=[0-9]*\b//" > ' . $folder . '/' . $tables[$a] . '.sql');
            }
        }
        @exec('sed "/^INSERT INTO \`fos_user\`.*$/d" -i '.$folder.'/fos_user.sql');
        @exec('sed "/^INSERT INTO \`user_profile\`.*$/d" -i '.$folder.'/user_profile.sql');
        @exec('sed "/^INSERT INTO \`privacy\`.*$/d" -i '.$folder.'/privacy.sql');
        $output->writeln(sprintf('Database structure and data exported to <comment>%s</comment>', $folder));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('folder')) {
            $folder = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please enter a folder:',
                function ($folder) {
                    if (empty($folder)) {
                        throw new \Exception('folder can not be empty');
                    }

                    return $folder;
                }
            );
            $input->setArgument('folder', $folder);
        }
    }
}
