<?php

namespace Afp\Repository\Base;

use Afp\Domain\Base\Model;

abstract class BaseRepository implements Repository
{
    private $_instance;

    public function getInstance()
    {
        return $this->_instance;
    }

    public function setInstance(Model $instance)
    {
        $this->_instance = $instance;
    }
}