<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;

class EMCAnswerTest extends \PHPUnit_Framework_TestCase
{

    private $_eMCAnswer;

    public function setUp()
    {
        $this->_eMCAnswer = new EMCAnswer();
    }

    public function testEMCAExtendsBaseModel()
    {
        $this->assertInstanceOf(BaseModel::class, $this->_eMCAnswer);
    }

    public function testSetAnswer()
    {
        $this->_eMCAnswer->answer = 'answer';
    }

    public function testGetAnswer()
    {
        $this->_eMCAnswer->answer = 'answer';
        $this->assertEquals('answer', $this->_eMCAnswer->answer);
    }

    public function testSetIsCorrect()
    {
        $this->_eMCAnswer->isCorrect = true;
    }

    public function testGetIsCorrect()
    {
        $this->_eMCAnswer->isCorrect = false;
        $this->assertEquals(false, $this->_eMCAnswer->isCorrect);
    }

    public function testSetParentId()
    {
        $this->_eMCAnswer->exerciseMultipleChoice = 1;
    }

    public function testGetParentId()
    {
        $this->_eMCAnswer->exerciseMultipleChoice = 1;
        $this->assertEquals(1, $this->_eMCAnswer->exerciseMultipleChoice);
    }
}