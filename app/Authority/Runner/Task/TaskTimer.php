<?php

namespace Authority\Runner\Task;

abstract class TaskTimer
{
    public static $startime;

    private $microtime;
    private $message = array();
    private $init;
    private $now;

    public function __construct()
    {
        if (empty(self::$startime)) {
            self::$startime = microtime(true);
        }

        $this->init = microtime(true);
        $this->now = strtotime('now');
    }

    public function stopTimer()
    {
        $this->microtime = microtime(true);
    }

    public function addMessage($comment)
    {
        $this->message[] = $comment;
    }

    public function getMessage()
    {
        return implode("<br />", $this->message);
    }

    public function getTimeRunAll()
    {
        return round($this->microtime - self::$startime, 4) . "s";
    }

    public function getTimeRunTask()
    {
        return round($this->microtime - $this->init, 4) . "s";
    }
}