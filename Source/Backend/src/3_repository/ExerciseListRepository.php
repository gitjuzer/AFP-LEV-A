<?php

namespace Afp\Repository;

use Afp\Repository\Base\BaseRepository;
use Afp\Shared\Factory\IDaoFactory;
use Afp\Domain\ExerciseList;

class ExerciseListRepository extends BaseRepository
{
    private $_dao;

    public function __construct(IDaoFactory $factory)
    {
        $this->_dao = $factory->getExerciseListDao();
    }

    public function findById($id)
    {
        $this->setInstance(new ExerciseList($this->_dao->findById($id)));
    }

    public function findAll($user)
    {
        return $this->_dao->findAll($user);
    }

    public function store($input, $user)
    {
        $id = $this->_dao->store($input, $user);
        $this->setInstance(new ExerciseList($this->_dao->findById($id)));
    }

    public function assign($input, $id)
    {
        $this->_dao->assign($input, $id);
        $this->setInstance(new ExerciseList($this->_dao->findById($id)));
    }

    public function getAssigned($id)
    {
        return $this->_dao->getAssigned($id);
    }

    public function update($id, $input)
    {
        $this->_dao->update($id, $input);
        $this->setInstance(new ExerciseList($this->_dao->findById($id)));
    }

    public function delete($id)
    {
        $this->_dao->delete($id);
    }

}