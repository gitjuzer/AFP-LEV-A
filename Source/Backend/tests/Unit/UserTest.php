<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;
use Afp\Shared\Exception\InaccessiblePropertyException;
use Afp\Shared\Helpers\UserTypeEnum;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $_user;

    public function setUp()
    {
        $this->_user = new User();
    }

    public function testUserExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_user);
    }

    public function testSetLoginName()
    {
        $this->_user->loginName = 'login name';
    }

    public function testGetLoginName()
    {
        $this->_user->loginName = 'login name';
        $this->assertEquals('login name', $this->_user->loginName);
    }

    public function testSetName()
    {
        $this->_user->name = 'login name';
    }

    public function testGetName()
    {
        $this->_user->name = 'login name';
        $this->assertEquals('login name', $this->_user->name);
    }

    //TODO test for valid email pattern
    public function testSetEmail()
    {
        $this->_user->email = 'login@name';
    }

    public function testGetEmail()
    {
        $this->_user->email = 'login@name';
        $this->assertEquals('login@name', $this->_user->email);
    }

    //TODO test for valid password pattern
    public function testSetPassword()
    {
        $this->_user->password = 'login@name';
    }

    public function testGetPasswordThrowsInaccessiblePropertyException()
    {
        $this->expectException(InaccessiblePropertyException::class);
        $this->_user->password;
    }

    public function testTypeAcceptStudentValue()
    {
        $this->_user->type = UserTypeEnum::STUDENT;
    }

    public function testTypeAcceptTeacherValue()
    {
        $this->_user->type = UserTypeEnum::TEACHER;
    }

    public function testTypeAcceptAdminValue()
    {
        $this->_user->type = UserTypeEnum::ADMIN;
    }

    public function testTypeReturnsCorrectValue()
    {
        $this->_user->type = UserTypeEnum::ADMIN;
        $this->assertEquals(UserTypeEnum::ADMIN, $this->_user->type);
    }

    public function testTypeDoesNotAcceptInvalidValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->_user->type = 'SomethingElse';
    }

}