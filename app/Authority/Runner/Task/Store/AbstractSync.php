<?php namespace Authority\Runner\Task\Store;

use Authority\Runner\Task\TaskMessage;

class AbstractSync
{
    protected $tm;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->tm = new TaskMessage($table);
    }

    public function getFeedDirName()
    {
        return $this->getSyncUploadDirectory() . $this->getFile();
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function getClassName()
    {
        return $this->table->class;
    }

    public function addMessage($message)
    {
        return $this->tm->addMessage($message);
    }

    public function stopTimer()
    {
        $this->tm->stopTimer();
    }

    public function getTimeRunTask()
    {
        return $this->tm->getTimeRunTask();
    }

    public function getMessages()
    {
        return $this->tm->getMessages();
    }

    public function getTimeRunAll()
    {
        return $this->tm->getTimeRunAll();
    }
}