<?php namespace Authority\Runner\Task\Fix;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class TreeDirectoryByPatternChild extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {


    }
}