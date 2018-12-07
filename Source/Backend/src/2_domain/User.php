<?php

namespace Afp\Domain;

use Afp\Domain\Base\BaseModel;
use Afp\Shared\Helpers\UserTypeEnum;

class User extends BaseModel implements \JsonSerializable
{
    private $loginName;
    private $name;
    private $email;
    private $password;
    private $type;

    public function __construct($user = null)
    {
        if ($user) {
            $this->id = (int)$user['id'];
            $this->setLoginName($user['loginName']);
            $this->setName($user['name']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setType($user['type']);
        }
    }

    public function getLoginName()
    {
        return $this->loginName;
    }

    public function setLoginName($loginName)
    {
        parent::checkPropertyIsString($loginName);
        $this->loginName = $loginName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        parent::checkPropertyIsString($name);
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        parent::checkPropertyIsString($email);
        $this->email = $email;
    }

    public function setPassword($password)
    {
        parent::checkPropertyIsString($password);
        $this->password = $password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        /*if (!UserTypeEnum::isValidValue($type)) {
            throw new \InvalidArgumentException(self::class . '\'s type must be UserTypeEnum');
        }*/
        $this->type = $type;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * @return array|mixed
     * @codeCoverageIgnore
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        unset($vars['password']);

        return $vars;
    }

}