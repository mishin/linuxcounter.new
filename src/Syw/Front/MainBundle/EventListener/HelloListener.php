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
class HelloListener extends CommandListener
{
    public function onCommand(BotCommandFoundEvent $event)
    {
        // get list of arguments passed after command
        $args = $event->getArguments();

        $msg = 'Hi, '.(isset($args[0]) ? $args[0] : 'nobody').' !';

        // write to the current channel
        $this->sendMessage(array($event->getChannel()), $msg);
    }
}
