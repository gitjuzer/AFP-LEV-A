<?php


namespace Afp\Data;


class MySqlCurriculum
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = 'SELECT C_ID id, C_Title title, C_Content content, C_T_ID topic FROM Curriculum WHERE C_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findAll($topic = null)
    {
        if ($topic !== null){
            $sql = 'SELECT C_ID id, C_Title title, C_Content content, C_T_ID topic FROM Curriculum WHERE C_T_ID = :topicId ORDER BY C_Title ASC';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->execute(['topicId' => $topic]);
        } else {
            $sql = 'SELECT C_ID id, C_Title title, C_Content content, C_T_ID topic FROM Curriculum ORDER BY C_Title ASC';
            $stmt = $this->_pdo->query($sql);
        }
        return $stmt->fetchAll();
    }

    public function store($input)
    {
        $sql = 'INSERT INTO Curriculum (C_Title, C_Content, C_T_ID) VALUES (:title, :content, :topic)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('title', $input['title']);
        $stmt->bindParam('content', $input['content']);
        $stmt->bindParam('topic', $input['topic']);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Curriculum WHERE C_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}