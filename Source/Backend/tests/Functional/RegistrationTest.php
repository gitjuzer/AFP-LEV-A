<?php

namespace Tests\Functional;


class RegistrationTest extends BaseTestCase
{

    public static function setUpBeforeClass()
    {
        $sql = 'SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE User;SET FOREIGN_KEY_CHECKS=1;';
        $query = self::$db->prepare($sql);
        $query->execute();
    }

    public static function tearDownAfterClass()
    {

    }

    public function testRegistrationWithRightCredentials()
    {
        $response = $this->runApp('POST', '/api/register', [
            'loginName' => 'arjunphp@gmail.com',
            'realName' => 'arjunphp@gmail.com',
            'email' => 'arjunphp@gmail.com',
            'password' => 'Arjun@123'
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('token', (string)$response->getBody());
        $this->assertNotContains('error', (string)$response->getBody());
    }

    public function testRegistrationWithExistingCredentials()
    {
        $response = $this->runApp('POST', '/api/register', [
            'loginName' => 'arjunphp@gmail.com',
            'realName' => 'arjunphp@gmail.com',
            'email' => 'arjunphp@gmail.com',
            'password' => 'Arjun@123'
        ]);

        $this->assertEquals(401, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('status', $data);
        $this->assertArrayHasKey('code', $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertEquals('error', $data['status']);
        $this->assertEquals(401, $data['code']);
        $this->assertContains('Integrity constraint violation', $data['message']);
    }
}