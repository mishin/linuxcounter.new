<?php

namespace Syw\Front\MainBundle\Tests\Controller;

class SecurityControllerTest extends BaseControllerTest
{
    public function testLoginSuccess()
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Login')->form(array( '_username' => $this->test_email, '_password' => $this->test_passwd ));
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertCount(1, $crawler->filter('li a:contains("Ausloggen")'));
    }


    public function testLoginFailure()
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Login')->form(array( '_username' => $this->test_email, '_password' => $this->test_passwd.'xyz' ));
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertCount(1, $crawler->filter('html:contains("Invalid credentials.")'));
    }
}
