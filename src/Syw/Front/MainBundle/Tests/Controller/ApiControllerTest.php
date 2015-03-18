<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testApiIndexContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("API")')->count());
    }
}
