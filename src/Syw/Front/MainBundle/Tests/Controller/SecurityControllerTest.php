<?php

namespace Syw\Front\MainBundle\Tests\Controller;

class SecurityControllerTest extends BaseControllerTest
{
    public function testLoginEnSuccess()
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Login')->form(array( '_username' => $this->test1_email, '_password' => $this->test1_passwd ));
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertCount(1, $crawler->filter('li a:contains("Logout")'));
    }

    public function testLoginDeSuccess()
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Login')->form(array( '_username' => $this->test2_email, '_password' => $this->test2_passwd ));
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertCount(1, $crawler->filter('li a:contains("Ausloggen")'));
    }

    public function testLoginFailure()
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Login')->form(array( '_username' => $this->test1_email, '_password' => $this->test1_passwd.'xyz' ));
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertCount(1, $crawler->filter('html:contains("Invalid credentials.")'));
    }
}
