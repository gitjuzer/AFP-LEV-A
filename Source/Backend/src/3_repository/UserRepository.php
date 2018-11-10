<?php

namespace Afp\Repository;

use Afp\Domain\User;
use Afp\Repository\Base\BaseRepository;
use Afp\Shared\Factory\DaoFactory;
use Afp\Shared\Helpers\UserTypeEnum;

class UserRepository extends BaseRepository
{
    private $_dao;

    public function __construct(DaoFactory $factory)
    {
        $this->_dao = $factory->getUserDao();
    }

    public function findById($id)
    {
        $row = $this->_dao->findById($id);
        $user = new User($row);
        return $user;
    }

}