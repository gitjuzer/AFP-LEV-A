<?php

namespace Afp\Repository;

use Afp\Repository\Base\BaseRepository;
use Afp\Shared\Factory\IDaoFactory;
use Afp\Domain\Topic;

class TopicRepository extends BaseRepository
{
    private $_dao;

    public function __construct(IDaoFactory $factory)
    {
        $this->_dao = $factory->getTopicDao();
    }

    public function findById($id)
    {
        $this->setInstance(new Topic($this->_dao->findById($id)));
    }

    public function findByName($name)
    {
        $this->setInstance(new Topic($this->_dao->findByName($name)));
    }

    public function findAll()
    {
        return $this->_dao->findAll();
    }

    public function store($input)
    {
        $id =  $this->_dao->store($input);
        $this->setInstance(new Topic($this->_dao->findById($id)));
    }

    public function update($id, $input)
    {
        $this->_dao->update($id, $input);
        $this->setInstance(new Topic($this->_dao->findById($id)));
    }

    public function delete($id)
    {
        $this->_dao->delete($id);
    }

}