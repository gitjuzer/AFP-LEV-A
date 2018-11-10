<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class TestTest extends \PHPUnit_Framework_TestCase
{

    private $_test;

    public function setUp()
    {
        $this->_test = new Test();
    }

    public function testTestExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_test);
    }

    public function testSetScore()
    {
        $this->_test->score = 1;
    }

    public function testGetScore()
    {
        $this->_test->score = 1;
        $this->assertEquals(1, $this->_test->score);
    }

    public function testSetParentId()
    {
        $this->_test->testList = 1;
    }

    public function testGetParentId()
    {
        $this->_test->testList = 1;
        $this->assertEquals(1, $this->_test->testList);
    }
}