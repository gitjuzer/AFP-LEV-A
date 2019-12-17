<?php

namespace Afp\Shared\Factory;

use Afp\Data\FakerUser;

class FakerFactory implements DaoFactory
{
    public function getUserDao()
    {
        return new FakerUser();
    }
}