<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Syw\Front\MainBundle\Tests\BaseTestCase;

/**
 * Class BaseControllerTest
 *
 * @author Alexander Löhner <alex.loehner@linux.com>
 */
abstract class BaseControllerTest extends BaseTestCase {


    protected $client = null;

    protected $test_email       = 'tester@linuxcounter.net';
    protected $test_passwd      = 'test123';

    public function setUp () {
        $this->client = static::createClient();
    }

}