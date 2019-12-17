<?php

namespace Afp\Repository;

use Afp\Domain\User;
use Afp\Repository\Base\BaseRepository;
use Afp\Shared\Factory\IDaoFactory;

class UserRepository extends BaseRepository
{
    private $_dao;

    public function __construct(IDaoFactory $factory)
    {
        $this->_dao = $factory->getUserDao();
    }

    public function findById($id)
    {
        $this->setInstance(new User($this->_dao->findById($id)));
    }

    public function findByEmail($email)
    {
        $this->setInstance(new User($this->_dao->findByEmail($email)));
    }

    public function store($input)
    {
        return $this->_dao->store($input);
    }

}