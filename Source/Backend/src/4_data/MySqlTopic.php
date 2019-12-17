<?php


namespace Afp\Data;


class MySqlTopic
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = 'SELECT T_ID id, T_Name name, T_Name name, T_Desc description FROM Topic WHERE T_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findByName($name)
    {
        $sql = 'SELECT T_ID id, T_Name name, T_Desc description FROM Topic WHERE T_Name = :title';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetch();
    }

    public function findAll()
    {
        $sql = 'SELECT T_ID id, T_Name name, T_Desc description FROM Topic ORDER BY T_Name ASC';
        $stmt = $this->_pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function store($input)
    {
        $sql = 'INSERT INTO Topic (T_Name, T_Desc) VALUES (:name, :description)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('name', $input['name']);
        $stmt->bindParam('description', $input['description']);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function update($id, $input)
    {
        $sql = 'UPDATE Topic SET T_Name = :name, T_Desc = :description WHERE T_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('name', $input['name']);
        $stmt->bindParam('description', $input['description']);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Topic WHERE T_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

}