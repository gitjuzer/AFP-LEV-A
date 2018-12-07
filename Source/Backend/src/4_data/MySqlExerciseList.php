<?php


namespace Afp\Data;


class MySqlExerciseList
{
    private $_pdo;

    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = 'SELECT TL_ID id, TL_Title title, TL_U_ID user FROM TestList WHERE TL_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function findAll($user = null)
    {
        if ($user !== null){
            $sql = 'SELECT TL_ID id, TL_Title title, TL_U_ID user FROM TestList WHERE TL_U_ID = :user';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->execute(['user' => $user]);
        } else {
            $sql = 'SELECT TL_ID id, TL_Title title, TL_U_ID user FROM TestList ';
            $stmt = $this->_pdo->query($sql);
        }
        return $stmt->fetchAll();
    }

    public function store($input, $userId)
    {
        $sql = 'INSERT INTO TestList (TL_Title, TL_U_ID) VALUES (:title, :userId)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindParam('title', $input['title']);
        $stmt->bindParam('userId', $userId);
        $stmt->execute();
        return $this->_pdo->lastInsertId();
    }

    public function assign($input, $id)
    {
        $sql = 'DELETE FROM EDTestList WHERE EDTL_TL_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        foreach ($input['dilemma'] as $dilemmaId){
            $sql = 'INSERT INTO EDTestList (EDTL_ED_ID, EDTL_TL_ID) VALUES (:ed_id, :id)';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindParam('ed_id', $dilemmaId);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        }
    }

    public function getAssigned($id)
    {
        $sql = 'SELECT ED_ID id, ED_Question question, (SELECT "dilemma") exerciseType FROM EDTestList INNER JOIN ExerciseDilemma ON EDTL_TL_ID = :id AND EDTL_ED_ID = ED_ID';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM TestList WHERE TL_ID = :id';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}