<?php

namespace Tests\Functional;


class LoginTest extends BaseTestCase
{


    public function testLoginWithRightCredentials()
    {
        $response = $this->runApp('POST', '/api/login', ['email' => 'arjunphp@gmail.com', 'password' => 'Arjun@123']);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('status', $data);
        $this->assertArrayHasKey('code', $data);
        $this->assertArrayHasKey('payload', $data);
        $this->assertArrayHasKey('token', $data['payload']);
        $this->assertEquals('success', $data['status']);
        $this->assertEquals(200, $data['code']);

        return $data;
    }

    public function testLoginWithWrongCredentials()
    {
        $response = $this->runApp('POST', '/api/login', ['email' => 'valami@example.comddd', 'password' => '1234567']);

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertContains('error', (string)$response->getBody());
        $this->assertNotContains('token', (string)$response->getBody());
    }

    /**
     * @depends testLoginWithRightCredentials
     */
    public function testValidToken($data)
    {
        $token = $data['payload']['token'];
        $response = $this->runApp(
            'GET',
            '/sapi/user',
            null,
            'application/json',
            $token);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testInValidToken()
    {
        $response = $this->runApp(
            'GET',
            '/sapi/user',
            null,
            'application/json',
            'abc');

        $this->assertEquals(401, $response->getStatusCode());
    }
}