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

    protected $test1_username    = '4iz5t0w4tnzwn45ptwnhpw5t';
    protected $test1_email       = 'tester1@linuxcounter.net';
    protected $test1_passwd      = 'w4nzvw7t07v5hnvw508tzowf';
    protected $test1_locale      = 'en';

    protected $test2_username    = 'p4eo5u6zw40597tznwp3thqp';
    protected $test2_email       = 'tester2@linuxcounter.net';
    protected $test2_passwd      = '39486ztn043wt7nv40thowu4';
    protected $test2_locale      = 'de';

    public function setUp()
    {
        @exec('php app/console syw:user:delete '.$this->test1_username.' >/dev/null 2>&1');
        @exec('php app/console syw:user:delete '.$this->test2_username.' >/dev/null 2>&1');
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
        @exec('php app/console syw:user:delete '.$this->test1_username.' >/dev/null 2>&1');
        @exec('php app/console syw:user:delete '.$this->test2_username.' >/dev/null 2>&1');
        parent::tearDown();
        $this->_em->close();
    }
}
