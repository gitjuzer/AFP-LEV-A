<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* A feladat leírását megvalósító osztály. */
class Exercise extends BaseModel
{
	/* Témakör lekérdezése. */
    public function getTopic()
    {
        return $this->_topic;
    }

	/* Témakör beállítása. */
    public function setTopic($topic)
    {
        parent::checkPropertyIsInteger($topic);
        $this->_topic = $topic;
    }

    private $_topic;
}