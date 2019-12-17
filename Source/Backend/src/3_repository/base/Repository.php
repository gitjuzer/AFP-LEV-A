<?php

namespace Afp\Repository\Base;

use Afp\Domain\Base\Model;

interface Repository
{
    public function setInstance(Model $instance);

    public function getInstance();
}