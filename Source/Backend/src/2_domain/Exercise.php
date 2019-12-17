<?php

namespace Afp\Domain;


use Afp\Domain\Base\BaseModel;

class Exercise extends BaseModel
{
    private $_topic;

    public function getTopic()
    {
        return $this->_topic;
    }

    public function setTopic($topic)
    {
        parent::checkPropertyIsInteger($topic);
        $this->_topic = $topic;
    }

}