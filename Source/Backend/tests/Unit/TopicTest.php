<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class TopicTest extends \PHPUnit_Framework_TestCase
{

    private $_topic;

    public function setUp()
    {
        $this->_topic = new Topic();
    }

    public function testTopicExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_topic);
    }

    public function testSetName()
    {
        $this->_topic->name = 'name';
    }

    public function testGetName()
    {
        $this->_topic->name = 'name';
        $this->assertEquals('name', $this->_topic->name);
    }

    public function testSetDescription()
    {
        $this->_topic->description = 'description';
    }

    public function testGetDescription()
    {
        $this->_topic->description = 'description';
        $this->assertEquals('description', $this->_topic->description);
    }
}