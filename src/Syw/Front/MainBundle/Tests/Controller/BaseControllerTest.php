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
    /**
     * @var EntityManager
     */
    public $_em;

    protected $client = null;

    protected $test1_email       = 'tester1@linuxcounter.net';
    protected $test1_passwd      = 'test123';

    protected $test2_email       = 'tester2@linuxcounter.net';
    protected $test2_passwd      = 'test123';

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->_em->beginTransaction();
        $this->client = static::createClient();
    }

    /**
     * Rollback changes.
     */
    public function tearDown()
    {
        $this->_em->rollback();
    }
}
