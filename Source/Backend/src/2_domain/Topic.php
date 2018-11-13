<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

/* Tantárgyat leíró osztály. */
class Topic extends BaseModel
{
	/* Tantárgy nevének lekérdezése. */
    public function getName()
    {
        return $this->_name;
    }

	/* Tantárgy nevének beállítása. */
    public function setName($name)
    {
        parent::checkPropertyIsString($name);
        $this->_name = $name;
    }

	/* Tantárgy leírásának lekérdezése. */
    public function getDescription()
    {
        return $this->_description;
    }

	/* Tantárgy leírásának beállítása. */
    public function setDescription($description)
    {
        parent::checkPropertyIsString($description);
        $this->_description = $description;
    }
	
    private $_name;
    private $_description;
}