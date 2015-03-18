<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatsControllerTest extends WebTestCase
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testStatsIndexContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/statistics');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Statistics")')->count());
    }
}
