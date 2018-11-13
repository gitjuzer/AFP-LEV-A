<?php

namespace Afp\Domain\Base;

interface Model
{
    public function __call($name, $arguments);

    public function __get($propertyName);

    public function __set($propertyName, $value);

    public function __isset($propertyName);
}