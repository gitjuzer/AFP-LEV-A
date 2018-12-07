<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class EMCAnswer extends BaseModel implements \JsonSerializable
{
    private $_answer;
    private $_isCorrect;
    private $_exerciseMultipleChoice;

    public function getExerciseMultipleChoice()
    {
        return $this->_exerciseMultipleChoice;
    }

    public function setExerciseMultipleChoice($exerciseMultipleChoice)
    {
        parent::checkPropertyIsInteger($exerciseMultipleChoice);
        $this->_exerciseMultipleChoice = $exerciseMultipleChoice;
    }

    public function getAnswer()
    {
        return $this->_answer;
    }

    public function setAnswer($question)
    {
        parent::checkPropertyIsString($question);
        $this->_answer = $question;
    }

    public function getIsCorrect()
    {
        return $this->_isCorrect;
    }

    public function setIsCorrect($isCorrect)
    {
        parent::checkPropertyIsBoolean($isCorrect);
        $this->_isCorrect = $isCorrect;
    }


    /**
     * @return array|mixed
     * @codeCoverageIgnore
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        unset($vars['password']);

        return $vars;
    }
}