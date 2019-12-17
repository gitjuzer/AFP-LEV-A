<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{

    public function testGetWithoutName()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('status', $data);
        $this->assertArrayHasKey('code', $data);
        $this->assertArrayHasKey('payload', $data);
        $this->assertArrayHasKey('message', $data['payload']);
        $this->assertEquals('success', $data['status']);
        $this->assertEquals(200, $data['code']);
        $this->assertEquals('AFP-LEV-A REST API', $data['payload']['message']);
    }

    public function testGetWithGreeting()
    {
        $response = $this->runApp('GET', '/test_name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello test_name!', (string)$response->getBody());
    }

    public function testPostMethodNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('status', $data);
        $this->assertArrayHasKey('code', $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertEquals('error', $data['status']);
        $this->assertEquals(405, $data['code']);
        $this->assertEquals('Method must be one of: GET', $data['message']);
    }

    public function testMediaTypeNotAllowed()
    {
        $response = $this->runApp('POST', '/', null, 'application/xml');

        $this->assertEquals(415, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(415, $data['code']);
        $this->assertEquals('Unsupported Media Type', $data['message']);
    }

    public function testEndpointNotFound()
    {
        $response = $this->runApp('GET', '/non/existing/endpoint');

        $this->assertEquals(404, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(404, $data['code']);
        $this->assertEquals('Not Found', $data['message']);
    }
}