<?php

namespace Afp\Domain;

/* Az alapértelmezett model leírása itt található */
use Afp\Domain\Base\BaseModel;

/* A tananyag leírását megvalósító osztály. */
class Curriculum extends BaseModel
{	

	/* Téma lekérdezése. */
    public function getTopic()
    {
        return $this->_topic;
    }

    /* Téma beállítása, a paraméterben kapott értékre. */
    public function setTopic($topic)
    {
        parent::checkPropertyIsInteger($topic);
        $this->_topic = $topic;
    }

    /* Tananyag címének lekérdezése. */
    public function getTitle()
    {
        return $this->_title;
    }

	/* Tananyag címének beállítása. */
    public function setTitle($title)
    {
        parent::checkPropertyIsString($title);
        $this->_title = $title;
    }

	/* Tananyag tartalmának lekérdezése. */ 
    public function getContext()
    {
        return $this->_context;
    }

	/* Tananyag tartalmának beállítása. */
    public function setContext($context)
    {
        parent::checkPropertyIsString($context);
        $this->_context = $context;
    }
	
    private $_title;
    private $_context;
    private $_topic;
}