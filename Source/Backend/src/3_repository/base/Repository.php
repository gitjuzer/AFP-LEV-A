<?php

namespace Afp\Repository\Base;

interface Repository
{

    public function setInstance(Repository $instance);

    public function getInstance();

}