<?php

namespace thoulah\httpclient\tests;

use thoulah\httpclient\Client;

class ClientTest extends tests
{
    public function testGetFile(): void
    {
        $client = new Client('https://www.google.com/');
        $result = $client->getFile('robots.txt');
        $this->assertTrue($result->getIsOk());
        $this->assertStringContainsString('Disallow: /search', $result->content);
    }

    public function testGetUrl(): void
    {
        $client = new Client('https://www.google.com/');
        $result = $client->getUrl('');
        $this->assertTrue($result->getIsOk());
        $this->assertStringContainsString('<title>Google</title>', $result->content);

        $client = new Client('https://postman-echo.com/', ['appName' => 'PHP Unit Test', 'appUrl' => 'http://www.example.com/']);
        $args = ['foo1' => bin2hex(random_bytes(5)), 'foo2' => bin2hex(random_bytes(10))];
        $result = $client->getUrl('get', $args);
        $this->assertTrue($result->getIsOk());
        $this->assertEquals($result->data['headers']['user-agent'], 'PHP Unit Test (+http://www.example.com/)');
        $this->assertEquals($result->data['args'], $args);
    }

    public function testSaveFile(): void
    {
        $client = new Client('https://www.google.com/');
        $this->assertTrue($client->saveFile('robots.txt', '/dev/null'));
        $this->assertFalse($client->saveFile('doesnotexist.txt', '/dev/null'));
    }
}
