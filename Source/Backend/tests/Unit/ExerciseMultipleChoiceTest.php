<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class ExerciseMultipleChoiceTest extends \PHPUnit_Framework_TestCase
{

    private $_exerciseMultipleChoice;

    public function setUp()
    {
        $this->_exerciseMultipleChoice = new ExerciseMultipleChoice();
    }

    public function testEMCExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_exerciseMultipleChoice);
    }

    public function testSetQuestion()
    {
        $this->_exerciseMultipleChoice->question = 'question';
    }

    public function testGetQuestion()
    {
        $this->_exerciseMultipleChoice->question = 'question';
        $this->assertEquals('question', $this->_exerciseMultipleChoice->question);
    }

    public function testSetExercise()
    {
        $this->_exerciseMultipleChoice->exercise = 1;
    }

    public function testGetTopic()
    {
        $this->_exerciseMultipleChoice->exercise = 1;
        $this->assertEquals(1, $this->_exerciseMultipleChoice->exercise);
    }
}