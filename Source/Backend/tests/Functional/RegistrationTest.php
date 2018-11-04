<?php

namespace Tests\Functional;


/*class RegistrationTest extends BaseTestCase
{

    public static function setUpBeforeClass()
    {
        $sql = 'DELETE FROM user WHERE U_ID != 1';
        $query = self::$db->prepare($sql);
        $query->execute();
    }

    public static function tearDownAfterClass()
    {

    }

    public function testRegistrationWithRightCredentials()
    {
        $response = $this->runApp('POST', '/api/register', [
            'loginName' => 'testLoginName',
            'realName' => 'testLoginName',
            'email' => 'testLoginName@example.com',
            'password' => '123456'
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('token', (string)$response->getBody());
        $this->assertNotContains('error', (string)$response->getBody());
    }

    public function testRegistrationWithExistingCredentials()
    {
        $response = $this->runApp('POST', '/api/register', [
            'loginName' => 'testLoginName',
            'realName' => 'testLoginName',
            'email' => 'testLoginName@example.com',
            'password' => '123456'
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
}*/