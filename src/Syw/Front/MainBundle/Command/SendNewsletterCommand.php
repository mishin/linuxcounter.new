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

/**
 * Class SendNewsletterEmail
 *
 * @category Command
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class SendNewsletterCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('syw:send:newsletter')
            ->setDescription('Sends an email to all users with the text from file')
            ->setDefinition(array(
                new InputArgument('file', InputArgument::REQUIRED, 'the item to import')
            ))
            ->setHelp(<<<EOT
The <info>syw:send:newsletter</info> sends a newsletter

EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');




        $output->writeln(sprintf('Mail sending disabled! Remove the exit in order to send the mail!'));
        exit(0);




        $SUBJECT = "";


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $mailbody = "";
        if (true === file_exists($file)) {
            $mailbody = file_get_contents($file);
            $mailbody = $mailbody."\r\n\r\n";
        }

        if ($mailbody == "") {
            $output->writeln(sprintf('Mailbody is empty! Mail not sent!'));
            exit(1);
        }
        if ($SUBJECT == "") {
            $output->writeln(sprintf('Subject is empty! Mail not sent!'));
            exit(1);
        }

        $db = $this->getContainer()->get('doctrine')->getManager();
        $userrepo = $db->getRepository('SywFrontMainBundle:User');
        $userprofilerepo = $db->getRepository('SywFrontMainBundle:UserProfile');

        $mails = $db->getRepository('SywFrontMainBundle:Mail')->findBy(array("newsletterAllowed" => 1));
        $numusers = count($mails);
        $a = 0;
        $itemsperloop = 2;
        $counter = 0;

        for ($a = 0; ($a+$itemsperloop)<$numusers; $a+=$itemsperloop) {
            unset($mails);
            $counter++;
            $mails   = $db->getRepository('SywFrontMainBundle:Mail')->findBy(
                array("newsletterAllowed" => 1),
                array(),
                $itemsperloop,
                $a
            );
            $mailer  = $this->getContainer()->get('mailer');
            $message = $mailer->createMessage()
                ->setSubject($SUBJECT)
                ->setFrom('noreply@linuxcounter.net')
                ->setTo('noreply@linuxcounter.net')
                ->setBody(
                    $mailbody,
                    'text/plain'
                );
            foreach ($mails as $mail) {
                $userprofile = $userprofilerepo->findOneBy(array("user" => $mail->getUser()));
                $message->addBcc($user->getEmail(), $userprofile->getFirstName() . '' . $userprofile->getLastName());
            }
            $mailer->send($message);
        }

        $output->writeln(sprintf(''.$counter.' Newsletter to '.$numusers.' emails successfully sent!'));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('file')) {
            $file = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please enter a file:',
                function ($file) {
                    if (empty($file)) {
                        throw new \Exception('file can not be empty');
                    }

                    return $file;
                }
            );
            $input->setArgument('file', $file);
        }
    }
}
