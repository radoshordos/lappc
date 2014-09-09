<?php

namespace Authority\Runner\Task;

class TaskMessage extends TaskTimer
{
    protected $start;
    protected $message;
    protected $db;


    public function __construct($db)
    {
        parent::__construct($db);
        $this->db = $db;
        $this->start = microtime(true);
        $this->comment = array();
    }

    public function addMessage($comment)
    {
        $this->message[] = $comment;
    }

    public function getMessages()
    {
        if (count($this->message) > 0) {
            return implode("<br />", $this->message);
        }
    }

    public function getTime()
    {
        return round(microtime(true) - $this->start, 5) . "s";
    }

    public function getClassName()
    {
        return $this->db->class;
    }
}