<?php

namespace Afp\Domain\Base;

use Afp\Shared\Exception\NotImplementedException;
use Afp\Shared\Exception\InaccessiblePropertyException;

abstract class BaseModel implements Model
{
    protected $id;

    public function __call($name, $arguments)
    {
        throw new NotImplementedException('Method does not exists');
    }

    public function __get($propertyName)
    {
        $methodName = $this->generateMethodNameIfExists($propertyName, 'get');
        return $this->$methodName();
    }

    public function __set($propertyName, $value)
    {
        $methodName = $this->generateMethodNameIfExists($propertyName, 'set');
        $this->$methodName($value);
    }

    public function __isset($propertyName)
    {
        return property_exists($this, $propertyName) && $this->$propertyName !== null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        self::checkPropertyIsInteger($id);
        $this->id = $id;
    }

    private function generateMethodNameIfExists($propertyName, $methodType)
    {
        $method = sprintf('%s%s', $methodType, $propertyName);
        if (method_exists($this, $method)) {
            return $method;
        }
        throw new InaccessiblePropertyException('Getting inaccessible property: ' . get_class($this) . '::' . $propertyName);
    }

    public static function checkPropertyIsInteger($prop)
    {
        if (!is_int($prop)) {
            throw new \InvalidArgumentException('Property must be an integer.');
        }
    }

    public static function checkPropertyIsString($prop)
    {
        if (!is_string($prop)) {
            throw new \InvalidArgumentException('Property must be an string.');
        }
    }

    public static function checkPropertyIsBoolean($prop)
    {
        if (!is_bool($prop)) {
            throw new \InvalidArgumentException('Property must be a boolean.');
        }
    }
}