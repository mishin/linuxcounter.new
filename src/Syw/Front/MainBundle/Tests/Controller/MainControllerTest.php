<?php

namespace Syw\Front\MainBundle\Tests\Controller;

class MainControllerTest extends BaseControllerTest
{
    /*
     * @desc Check for using the base.html.twig
     */
    public function testMainIndexCharset()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/');
        $this->assertGreaterThan(0, $crawler->filter('meta[charset="utf-8"]')->count());
    }

    /*
     * @desc Check for the correct content on /
     */
    public function testMainIndexContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("We are providing the most accurate and complete statistics about linux and its distributions, users, kernels and machines in the world wide web. This also includes statistics about users per country or city, most used cpus, top uptimes lists and much more.")')->count());
    }

    /*
     * @desc Check for the correct content on /contact
     */
    public function testMainContactContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/contact');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Contact")')->count());
    }

    /*
     * @desc Check for the correct content on /about
     */
    public function testMainAboutContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/about');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("About")')->count());
    }

    /*
     * @desc Check for the correct content on /download
     */
    public function testMainDownloadContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/download');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Download")')->count());
    }

    /*
     * @desc Check for the correct content on /impressum
     */
    public function testMainImpressumContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/impressum');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Imprint")')->count());
    }

    /*
     * @desc Check for the correct content on /support
     */
    public function testMainSupportContent()
    {
        $basehost = $this->client->getKernel()->getContainer()->getParameter('base_host');
        $crawler = $this->client->request('GET', 'http://'.$basehost.'/support');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Support")')->count());
    }
}
