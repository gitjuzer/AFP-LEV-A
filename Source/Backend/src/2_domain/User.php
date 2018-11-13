<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;
use Afp\Shared\Helpers\UserTypeEnum;

/* Felhasználó objektum megvalósítását leíró osztály. */
class User extends BaseModel implements \JsonSerializable
{
	/* Konstruktor, ami ha megkapja a felhasznáói adatokat, akkor beállítja a saját változóiba. */
    public function __construct($user = null)
    {
        if ($user) {
            $this->id = $user['id'];
            $this->setLoginName($user['loginName']);
            $this->setName($user['name']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setType($user['type']);
        }
    }

	/* Felhasználó login nevének lekérdezése. */
    public function getLoginName()
    {
        return $this->loginName;
    }

	/* Felhasználó login nevének beállítása. */
    public function setLoginName($loginName)
    {
        parent::checkPropertyIsString($loginName);
        $this->loginName = $loginName;
    }

	/* Felhasználó nevének lekérdezése. */
    public function getName()
    {
        return $this->name;
    }

	/* Felhasználó nevének beállítása. */
    public function setName($name)
    {
        parent::checkPropertyIsString($name);
        $this->name = $name;
    }

	/* Felhasználó emailcímének lekérdezése. */
    public function getEmail()
    {
        return $this->email;
    }

	/* Felhasználó emailcímének beállítása. */
    public function setEmail($email)
    {
        parent::checkPropertyIsString($email);
        $this->email = $email;
    }

	/* Felhasználó jelszavának beállítása. */
    public function setPassword($password)
    {
        parent::checkPropertyIsString($password);
        $this->password = $password;
    }

	/* Felhasználó típusának lekérdezése. (tanár, diák, admin) */
    public function getType()
    {
        return $this->type;
    }

	/* Felhasználó típusának beállítása. */
    public function setType($type)
    {
        if (!UserTypeEnum::isValidValue($type)) {
            throw new \InvalidArgumentException(self::class . '\'s type must be UserTypeEnum');
        }
        $this->type = $type;
    }

    /**
     * @codeCoverageIgnore
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        unset($vars['password']);

        return $vars;
    }

    private $loginName;
    private $name;
    private $email;
    private $password;
    private $type;	
}