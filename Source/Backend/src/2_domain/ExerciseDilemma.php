<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Igen/Nem feleletválasztós feladatokat leíró osztály. */
class ExerciseDilemma extends BaseModel
{
	/* Feladat lekérdezése. */
    public function getExercise()
    {
        return $this->_exercise;
    }

	/* Feladat beállítása. */
    public function setExercise($exercise)
    {
        parent::checkPropertyIsInteger($exercise);
        $this->_exercise = $exercise;
    }

	/* Kérdés lekérdezése. */
    public function getQuestion()
    {
        return $this->_question;
    }

	/* Kérdés beállítása. */
    public function setQuestion($question)
    {
        parent::checkPropertyIsString($question);
        $this->_question = $question;
    }

	/* Válasz lekérdezése. */
    public function getYesNo()
    {
        return $this->_yesNo;
    }

	/* Válasz beállítása. */
    public function setYesNo($yesNo)
    {
        parent::checkPropertyIsInteger($yesNo);
        $this->_yesNo = $yesNo;
    }
	
    private $_question;
    private $_yesNo;
    private $_exercise;
}