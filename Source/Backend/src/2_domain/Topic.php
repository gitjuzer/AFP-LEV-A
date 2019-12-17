<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class Topic extends BaseModel implements \JsonSerializable
{
    private $name;
    private $description;

    public function __construct($topic = null)
    {
        if ($topic) {
            $this->id = (int)$topic['id'];
            $this->setName($topic['name']);
            $this->setDescription($topic['description']);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        parent::checkPropertyIsString($name);
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        parent::checkPropertyIsString($description);
        $this->description = $description;
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