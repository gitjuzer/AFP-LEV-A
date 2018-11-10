<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class TestListTest extends \PHPUnit_Framework_TestCase
{

    private $_testList;

    public function setUp()
    {
        $this->_testList = new TestList();
    }

    public function testTestListExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_testList);
    }
    public function testSetTitle()
    {
        $this->_testList->title = 'title';
    }

    public function testGetTitle()
    {
        $this->_testList->title = 'title';
        $this->assertEquals('title', $this->_testList->title);
    }

    public function testSetParentId()
    {
        $this->_testList->user = 1;
    }

    public function testGetParentId()
    {
        $this->_testList->user = 1;
        $this->assertEquals(1, $this->_testList->user);
    }
}