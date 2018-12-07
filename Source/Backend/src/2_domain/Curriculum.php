<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class Curriculum extends BaseModel implements \JsonSerializable
{
    private $title;
    private $content;
    private $topic;

    public function __construct($curriculum = null)
    {
        if ($curriculum) {
            $this->id = (int)$curriculum['id'];
            $this->setContent($curriculum['content']);
            $this->setTitle($curriculum['title']);
            $this->setTopic((int)$curriculum['topic']);
        }
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function setTopic($topic)
    {
        parent::checkPropertyIsInteger($topic);
        $this->topic = $topic;
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

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($context)
    {
        parent::checkPropertyIsString($context);
        $this->content = $context;
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