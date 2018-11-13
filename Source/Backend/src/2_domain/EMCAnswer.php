<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Feladat választó feladatok válaszainak leíró osztálya. */
class EMCAnswer extends BaseModel
{
	/* Felelet választó feladat lekérdezése. */
    public function getExerciseMultipleChoice()
    {
        return $this->_exerciseMultipleChoice;
    }

	/* Felelet választó feladat beállítása. */
    public function setExerciseMultipleChoice($exerciseMultipleChoice)
    {
        parent::checkPropertyIsInteger($exerciseMultipleChoice);
        $this->_exerciseMultipleChoice = $exerciseMultipleChoice;
    }

	/* Egy lehetséges válasz lekérdezése. */
    public function getAnswer()
    {
        return $this->_answer;
    }

	/* Egy lehetséges válasz  beállítása. */
    public function setAnswer($question)
    {
        parent::checkPropertyIsString($question);
        $this->_answer = $question;
    }

	/* A válasz helyes vagy nem lekérdezése. */
    public function getIsCorrect()
    {
        return $this->_isCorrect;
    }

	/* A válasz helyes vagy nem beállítása. */
    public function setIsCorrect($isCorrect)
    {
        parent::checkPropertyIsBoolean($isCorrect);
        $this->_isCorrect = $isCorrect;
    }
	
    private $_answer;
    private $_isCorrect;
    private $_exerciseMultipleChoice;
}