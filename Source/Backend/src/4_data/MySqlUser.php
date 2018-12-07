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
        $sql = 'SELECT U_Email email, U_LoginName loginName, U_Name name, U_Pass password, U_Type type, U_ID id FROM User WHERE U_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findByEmail($email)
    {
        $sql = 'SELECT U_Email email, U_LoginName loginName, U_Name name, U_Pass password, U_Type type, U_ID id FROM User WHERE U_Email = :email';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function store($input){
        $sql = 'INSERT INTO User (U_LoginName, U_Name, U_Email, U_Pass) 
                  VALUES (:loginName, :realName, :email, :password)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('loginName', $input['loginName']);
        $stmt->bindParam('realName', $input['realName']);
        $stmt->bindParam('email', $input['email']);
        $pass = password_hash($input['password'], PASSWORD_DEFAULT);
        $stmt->bindParam('password', $pass);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }
}