<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class ExerciseMultipleChoice extends BaseModel implements \JsonSerializable
{
    private $_question;
    private $_exercise;

    public function getExercise()
    {
        return $this->_exercise;
    }

    public function setExercise($exercise)
    {
        parent::checkPropertyIsInteger($exercise);
        $this->_exercise = $exercise;
    }

    public function getQuestion()
    {
        return $this->_question;
    }

    public function setQuestion($question)
    {
        parent::checkPropertyIsString($question);
        $this->_question = $question;
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