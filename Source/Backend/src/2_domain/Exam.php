<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Tanulók által kitöltött teszt eredmények tábla. */
class Exam extends BaseModel
{
	/* Teszt lista lekérdezése. */
    public function getTestList()
    {
        return $this->_testList;
    }

	/* Teszt lista beállítása. */
    public function setTestList($testList)
    {
        parent::checkPropertyIsInteger($testList);
        $this->_testList = $testList;
    }

	/* Teszt eredmény lekérdezése. */
    public function getScore()
    {
        return $this->_score;
    }

	/* Teszt eredmény beállítása. */
    public function setScore($score)
    {
        parent::checkPropertyIsInteger($score);
        $this->_score = $score;
    }

    private $_score;
    private $_testList;
	
}