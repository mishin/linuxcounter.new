<?php

namespace Syw\Front\NewsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SywFrontNewsBundle
 *
 * @category Bundle
 * @package  SywFrontNewsBundle
 * @author   Alexander Löhner <alex.loehner@linux.com>
 * @license  GPL v3
 * @link     https://github.com/alexloehner/linuxcounter.new
 */
class SywFrontNewsBundle extends Bundle
{
    public function getParent()
    {
        return 'BladeTesterLightNewsBundle';
    }
}
