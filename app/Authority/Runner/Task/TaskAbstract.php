<?php namespace Authority\Runner\Task;

abstract class TaskAbstract
{
    protected $dbTable;
    protected $message = [];
    protected $resultTime = 0;

    public function __construct($dbTable)
    {
        $this->dbTable = $dbTable;
    }

    public function getClassName()
    {
        return $this->dbTable->class;
    }

    public function getMessages()
    {
        if (count($this->message) > 0) {
            return implode("<br />", $this->message);
        }
    }

    public function addMessage($comment)
    {
        $this->message[] = $comment;
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