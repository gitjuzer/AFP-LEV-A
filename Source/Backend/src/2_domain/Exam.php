<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class Exam extends BaseModel implements \JsonSerializable
{
    private $_score;
    private $_exerciseList;

    public function getExerciseList()
    {
        return $this->_exerciseList;
    }

    public function setExerciseList($testList)
    {
        parent::checkPropertyIsInteger($testList);
        $this->_exerciseList = $testList;
    }

    public function getScore()
    {
        return $this->_score;
    }

    public function setScore($score)
    {
        parent::checkPropertyIsInteger($score);
        $this->_score = $score;
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