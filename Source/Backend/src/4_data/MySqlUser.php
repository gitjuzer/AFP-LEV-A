<?php

namespace Afp\Data;

class MySqlUser
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function findById($id)
    {
        $stmt = $this->_pdo->prepare('SELECT U_Email email, U_LoginName loginName, U_Name name, U_Pass password, U_Type type, U_ID id FROM User WHERE U_ID = :id');
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return $user;
    }
}