<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Teszt listákat leíró osztály. */
class ExamList extends BaseModel
{
	/* Felhasználó lekérdezése (tanár). */
    public function getUser()
    {
        return $this->_user;
    }

	/* Felhasználó beállítása. (tanár). */
    public function setUser($user)
    {
        parent::checkPropertyIsInteger($user);
        $this->_user = $user;
    }

	/* Lista nevének lekérdezése. */
    public function getTitle()
    {
        return $this->_title;
    }

	/* Lista nevének beállítása. */
    public function setTitle($title)
    {
        parent::checkPropertyIsString($title);
        $this->_title = $title;
    }

    private $_title;
    private $_user;	
}