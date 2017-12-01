<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/transactions');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Impressum', $crawler->filter('.footer-navi')->text());
    }


    public function testDdd()
    {
        $this->assertEquals(200, 200);
    }
}
