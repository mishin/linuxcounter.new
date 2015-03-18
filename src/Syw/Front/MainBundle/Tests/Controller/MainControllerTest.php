<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testCheckForUtf8()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(1, $crawler->filter('meta[charset="utf-8"]')->count(),
            'document shall have a meta[charset="utf-8"] node');
    }

    /*
     * @desc Check for the correct content on /
     */
    public function testCheckForCorrectContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("We are providing the most accurate and complete statistics about linux and its distributions, users, kernels and machines in the world wide web. This also includes statistics about users per country or city, most used cpus, top uptimes lists and much more.")')->count());
    }
}
