<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testCheckForBaseLayout()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Welcome!")')->count());
    }

    /*
     * @desc Check for the correct content on /
     */
    public function testCheckForCorrectContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Hallo Alex")')->count());
    }
}
