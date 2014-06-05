<?php

namespace Authority\Runner\Task;

class TaskMessage extends TaskTimer
{
    protected $start;
    protected $message;

    public function __construct()
    {
        $this->start = microtime(true);
        $this->comment = array();
    }

    public function addComment($comment)
    {
        $this->message[] = $comment;
    }

    public function getComment()
    {
        if (count($this->message) > 0) {
            return implode("<br />", $this->message);
        }
    }

    public function getTime()
    {
        $this->time = round(microtime(true) - $this->start, 5) . "s";
        return $this->time;
    }
}