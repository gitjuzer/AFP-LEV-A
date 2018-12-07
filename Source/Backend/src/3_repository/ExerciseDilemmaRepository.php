<?php

namespace Afp\Repository;

use Afp\Repository\Base\BaseRepository;
use Afp\Shared\Factory\IDaoFactory;
use Afp\Domain\ExerciseDilemma;

class ExerciseDilemmaRepository extends BaseRepository
{
    private $_dao;

    public function __construct(IDaoFactory $factory)
    {
        $this->_dao = $factory->getExerciseDilemmaDao();
    }

    public function findById($id)
    {
        $this->setInstance(new ExerciseDilemma($this->_dao->findById($id)));
    }

    public function findAll($topic)
    {
        return $this->_dao->findAll($topic);
    }

    public function store($input)
    {
        $id =  $this->_dao->store($input);
        $this->setInstance(new ExerciseDilemma($this->_dao->findById($id)));
    }

    public function update($id, $input)
    {
        $this->_dao->update($id, $input);
        $this->setInstance(new ExerciseDilemma($this->_dao->findById($id)));
    }

    public function delete($id)
    {
        $this->_dao->delete($id);
    }

}