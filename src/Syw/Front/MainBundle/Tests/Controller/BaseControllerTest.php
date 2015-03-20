<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Syw\Front\MainBundle\Tests\BaseTestCase;

/**
 * Class BaseControllerTest
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
abstract class BaseControllerTest extends BaseTestCase
{


    protected $client = null;

    protected $test1_email       = 'tester1@linuxcounter.net';
    protected $test1_passwd      = 'test123';

    protected $test2_email       = 'tester2@linuxcounter.net';
    protected $test2_passwd      = 'test123';

    public function setUp()
    {
        $this->client = static::createClient();
    }
}
