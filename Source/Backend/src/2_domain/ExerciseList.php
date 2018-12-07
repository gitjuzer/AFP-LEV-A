<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class ExerciseList extends BaseModel implements \JsonSerializable
{
    private $title;
    private $user;

    public function __construct($exerciseList = null)
    {
        if ($exerciseList) {
            $this->id = (int)$exerciseList['id'];
            $this->setTitle($exerciseList['title']);
            $this->setUser((int)$exerciseList['user']);
        }
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        parent::checkPropertyIsInteger($user);
        $this->user = $user;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        parent::checkPropertyIsString($title);
        $this->title = $title;
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