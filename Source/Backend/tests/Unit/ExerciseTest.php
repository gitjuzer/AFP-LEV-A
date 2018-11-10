<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class ExerciseTest extends \PHPUnit_Framework_TestCase
{

    private $_exercise;

    public function setUp()
    {
        $this->_exercise = new Exercise();
    }

    public function testTestListExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_exercise);
    }

    public function testSetTopic()
    {
        $this->_exercise->topic = 1;
    }

    public function testGetTopic()
    {
        $this->_exercise->topic = 1;
        $this->assertEquals(1, $this->_exercise->topic);
    }
}