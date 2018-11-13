<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Felelet választó feladatot leíró osztály. */
class ExerciseMultipleChoice extends BaseModel
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
		
    private $_question;
    private $_exercise;
}