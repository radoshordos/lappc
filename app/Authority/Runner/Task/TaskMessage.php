<?php namespace Authority\Runner\Task;

class TaskMessage
{
    protected $db;
    protected $message;
    protected $timer;
    protected $resultTime = 0;

    public function __construct($db)
    {
        $this->db = $db;
        $this->timer = new \PHP_Timer();
        $this->comment = [];
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

    public function getClassName()
    {
        return $this->db->class;
    }

    public function getResultTime()
    {
        return $this->resultTime;
    }

    public function setResultTime($resultTime)
    {
        $this->resultTime = $resultTime;
    }

    public function stop()
    {
        return $this->timer->stop();
    }
}