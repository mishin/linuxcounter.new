<?php

namespace Syw\Front\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testUserLoginContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Login")')->count());
    }

    /*
     * @desc Check for using the base.html.twig
     */
    public function testUserRegisterContent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Register")')->count());
    }
}
