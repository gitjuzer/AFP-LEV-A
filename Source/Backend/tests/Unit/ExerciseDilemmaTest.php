<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class ExerciseDilemmaDilemmaTest extends \PHPUnit_Framework_TestCase
{

    private $_exerciseDilemma;

    public function setUp()
    {
        $this->_exerciseDilemma = new ExerciseDilemma();
    }

    public function testEDExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_exerciseDilemma);
    }

    public function testSetQuestion()
    {
        $this->_exerciseDilemma->question = 'question';
    }

    public function testGetQuestion()
    {
        $this->_exerciseDilemma->question = 'question';
        $this->assertEquals('question', $this->_exerciseDilemma->question);
    }

    public function testSetScore()
    {
        $this->_exerciseDilemma->yesNo = 1;
    }

    public function testGetScore()
    {
        $this->_exerciseDilemma->yesNo = 1;
        $this->assertEquals(1, $this->_exerciseDilemma->yesNo);
    }

    public function testSetExercise()
    {
        $this->_exerciseDilemma->exercise = 1;
    }

    public function testGetTopic()
    {
        $this->_exerciseDilemma->exercise = 1;
        $this->assertEquals(1, $this->_exerciseDilemma->exercise);
    }
}