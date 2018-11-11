<?php

namespace Afp\Shared\Factory;

use Afp\Data\MySqlUser;

class MySqlFactory implements DaoFactory
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function getUserDao()
    {
        return new MySqlUser($this->_pdo);
    }
}