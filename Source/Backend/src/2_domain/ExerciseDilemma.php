<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class ExerciseDilemma extends BaseModel implements \JsonSerializable
{
    private $question;
    private $yesNo;
    private $topic;

    public function __construct($exerciseDilemma = null)
    {
        if ($exerciseDilemma) {
            $this->id = (int)$exerciseDilemma['id'];
            $this->setQuestion($exerciseDilemma['question']);
            $this->setYesNo((int)$exerciseDilemma['yesNo']);
            $this->setTopic((int)$exerciseDilemma['topic']);
        }
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function setTopic($topic)
    {
        parent::checkPropertyIsInteger($topic);
        $this->topic = $topic;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        parent::checkPropertyIsString($question);
        $this->question = $question;
    }

    public function getYesNo()
    {
        return $this->yesNo;
    }

    public function setYesNo($yesNo)
    {
        parent::checkPropertyIsInteger($yesNo);
        $this->yesNo = $yesNo;
    }

    /**
     * @return array|mixed
     * @codeCoverageIgnore
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}