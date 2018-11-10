<?php

namespace Afp\Repository\Base;

abstract class BaseRepository implements Repository
{
    private $_instance;
    private $_id;

    public function getInstance()
    {
        return $this->_instance;
    }

    public function setInstance(Repository $instance)
    {
        $this->_instance = $instance;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        if (!is_int($id)) {
            throw new \UnexpectedValueException(self::class . '\'s id must be an integer!');
        }
        $this->_id = $id;
    }
}