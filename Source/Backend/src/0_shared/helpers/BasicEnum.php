<?php

namespace Afp\Shared\Helpers;

/**
 * Class BasicEnum
 * @package Afp\Shared\Helpers
 *
 * EXAMPLE USAGE:
 *
 * abstract class DaysOfWeek extends BasicEnum {
 *  const Sunday = 0;
 *  const Monday = 1;
 *  const Tuesday = 2;
 *  const Wednesday = 3;
 *  const Thursday = 4;
 *  const Friday = 5;
 *  const Saturday = 6;
 * }
 *
 * DaysOfWeek::isValidName('NullValue');                  // false
 * DaysOfWeek::isValidName('Monday');                   // true
 * DaysOfWeek::isValidName('monday');                   // true
 * DaysOfWeek::isValidName('monday', $strict = true);   // false
 * DaysOfWeek::isValidName(0);                          // false
 *
 * DaysOfWeek::isValidValue(0);                         // true
 * DaysOfWeek::isValidValue(5);                         // true
 * DaysOfWeek::isValidValue(7);                         // false
 * DaysOfWeek::isValidValue('Friday');                  // false
 */


abstract class BasicEnum
{
    private static $constCacheArray = NULL;

    private static function getConstants()
    {
        if (self::$constCacheArray === NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = static::class;
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false)
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys, true);
    }

    public static function isValidValue($value, $strict = true)
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
}