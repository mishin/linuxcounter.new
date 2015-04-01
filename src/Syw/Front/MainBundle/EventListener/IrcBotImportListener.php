<?php

namespace Syw\Front\MainBundle\EventListener;

use Whisnet\IrcBotBundle\EventListener\Plugins\Commands\CommandListener;
use Whisnet\IrcBotBundle\Event\BotCommandFoundEvent;

/**
 * Class HelloListener
 *
 * @category FormType
 * @package  SywFrontMainBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class IrcBotImportListener extends CommandListener
{
    public function onCommand(BotCommandFoundEvent $event)
    {
        // get list of arguments passed after command
        // $args = $event->getArguments();


        $running = @exec('ps ax | grep "syw:import:lico" | grep -v grep');
        if (trim($running) == "") {
            $msg = "There is actually no import running.";
            $this->sendMessage(array($event->getChannel()), $msg);
        } else {







        }
    }
}
