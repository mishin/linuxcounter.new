<?php

namespace Syw\Front\MainBundle\Tests\Controller;

class StatsControllerTest extends BaseControllerTest
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testStatsIndexContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/statistics');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Statistics")')->count());
    }

    /*
     * @desc Check for using the base.html.twig
     */
    public function testStatsGuessContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/statistics/guess');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Guess")')->count());
    }
}
