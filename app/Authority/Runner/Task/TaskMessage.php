<?php namespace Authority\Runner\Task;

class TaskMessage extends TaskAbstract
{
    protected $timer;

    public function __construct($dbTable)
    {
        parent::__construct($dbTable);
        $this->timer = new \PHP_Timer();
    }

    public function stop()
    {
        return $this->timer->stop();
    }
}