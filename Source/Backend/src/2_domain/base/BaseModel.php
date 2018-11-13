<?php

namespace Afp\Domain\Base;

use Afp\Shared\Exception\NotImplementedException;
use Afp\Shared\Exception\InaccessiblePropertyException;

/* Adatbázis táblák kapcsolatát elősegítő absztrakt osztály, a közös funkciókat tartalmazza. */
abstract class BaseModel implements Model
{
    protected $id;

	/* ToDo: tisztázni kell a működését még! */
    public function __call($name, $arguments)
    {
        throw new NotImplementedException('Method does not exists');
    }

	/* Változó értékének lekérdezése. */
    public function __get($propertyName)
    {
        $methodName = $this->generateMethodNameIfExists($propertyName, 'get');
        return $this->$methodName();
    }

	/* Változó értékének beállítása. */
    public function __set($propertyName, $value)
    {
        $methodName = $this->generateMethodNameIfExists($propertyName, 'set');
        $this->$methodName($value);
    }
	
	/* Ellenőrző függvény, hogy a megadott property létezik-e és ha igen, akkor ne legyen null. */
    public function __isset($propertyName)
    {
        return property_exists($this, $propertyName) && $this->$propertyName !== null;
    }

	/* Mivel minden táblában van azonosító, ezért ezt az alap osztályban kezeljük: */
	
	/* Rekord azonosító lekérdezése. */
    public function getId()
    {
        return $this->id;
    }

	/* Rekord azonosító beállítása. */
    public function setId($id)
    {
        self::checkPropertyIsInteger($id);
        $this->id = $id;
    }

	/* Érték ellenőrzése, hogy szám-e. Ha nem szám, akkor hibát dob. */
    public static function checkPropertyIsInteger($prop)
    {
        if (!is_int($prop)) {
            throw new \InvalidArgumentException('Property must be an integer.');
        }
    }

	/* Érték ellenőzrése, hogy szöveg-e. Ha nem szöveg, akkor hibát dob. */
    public static function checkPropertyIsString($prop)
    {
        if (!is_string($prop)) {
            throw new \InvalidArgumentException('Property must be an integer.');
        }
    }

	/* Érték ellenőrzése, hogy logikai érték-e. Ha nem, akkor hibát dob. */
    public static function checkPropertyIsBoolean($prop)
    {
        if (!is_bool($prop)) {
            throw new \InvalidArgumentException('Property must be a boolean.');
        }
    }
	
    private function generateMethodNameIfExists($propertyName, $methodType)
    {
        $method = sprintf('%s%s', $methodType, $propertyName);
        if (method_exists($this, $method)) {
            return $method;
        }
        throw new InaccessiblePropertyException('Getting inaccessible property: ' . get_class($this) . '::' . $propertyName);
    }
}