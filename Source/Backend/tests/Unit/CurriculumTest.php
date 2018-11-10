<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class CurriculumTest extends \PHPUnit_Framework_TestCase
{

    private $_curriculum;

    public function setUp()
    {
        $this->_curriculum = new Curriculum();
    }

    public function testCurriculumExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_curriculum);
    }

    public function testSetTitle()
    {
        $this->_curriculum->title = 'title';
    }

    public function testGetTitle()
    {
        $this->_curriculum->title = 'title';
        $this->assertEquals('title', $this->_curriculum->title);
    }

    public function testSetContext()
    {
        $this->_curriculum->context = 'context';
    }

    public function testGetContext()
    {
        $this->_curriculum->context = 'context';
        $this->assertEquals('context', $this->_curriculum->context);
    }

    public function testSetTopic()
    {
        $this->_curriculum->topic = 1;
    }

    public function testGetTopic()
    {
        $this->_curriculum->topic = 1;
        $this->assertEquals(1, $this->_curriculum->topic);
    }
}