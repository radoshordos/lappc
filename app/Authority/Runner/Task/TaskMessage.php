<?php namespace Authority\Runner\Task;

class TaskMessage
{
    protected $start;
    protected $message;
    protected $db;
    protected $microtime;
    protected $resultTime = 0;

    public function __construct($db)
    {
        $this->db = $db;
        $this->start = new \PHP_Timer();
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

    public function stopTimer()
    {
        $this->microtime = microtime(TRUE);
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
}