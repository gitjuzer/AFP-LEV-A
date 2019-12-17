<?php


namespace Afp\Data;


class MySqlExerciseDilemma
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = 'SELECT ED_ID id, ED_Question question, ED_YesNo yesNo, ED_T_ID topic FROM ExerciseDilemma WHERE ED_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findAll($topic = null)
    {
        if ($topic !== null){
            $sql = 'SELECT ED_ID id, ED_Question question, ED_YesNo yesNo, ED_T_ID topic FROM ExerciseDilemma WHERE ED_T_ID = :topicId';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->execute(['topicId' => $topic]);
        } else {
            $sql = 'SELECT ED_ID id, ED_Question question, ED_YesNo yesNo, ED_T_ID topic FROM ExerciseDilemma';
            $stmt = $this->_pdo->query($sql);
        }
        return $stmt->fetchAll();
    }

    public function store($input)
    {
        $sql = 'INSERT INTO ExerciseDilemma (ED_Question, ED_YesNo, ED_T_ID) VALUES (:question, :yesNo, :topic)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('question', $input['question']);
        $stmt->bindParam('yesNo', $input['yesNo']);
        $stmt->bindParam('topic', $input['topic']);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM ExerciseDilemma WHERE ED_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}