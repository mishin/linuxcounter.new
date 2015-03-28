<?php

namespace Syw\Front\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Model\User;

/**
 *
 */
class DeleteUserCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('syw:user:delete')
            ->setDescription('Delete a user.')
            ->setDefinition(array(
                new InputArgument('username', InputArgument::REQUIRED, 'The username')
            ))
            ->setHelp(<<<EOT
The <info>fos:user:delete</info> command deletes a user:

  <info>php app/console fos:user:delete matthieu</info>

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $db = $this->getContainer()->get('doctrine')->getManager();
        $username   = $input->getArgument('username');
        $manipulator = $this->getContainer()->get('syw.util.user_manipulator');
        $manipulator->delete($username);

        $output->writeln(sprintf('Deleted user <comment>%s</comment>', $username));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('username')) {
            $username = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a username:',
                function ($username) {
                    if (empty($username)) {
                        throw new \Exception('Username can not be empty');
                    }

                    return $username;
                }
            );
            $input->setArgument('username', $username);
        }
    }
}
