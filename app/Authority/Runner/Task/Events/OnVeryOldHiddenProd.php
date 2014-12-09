<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\Prod;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class OnVeryOldHiddenProd extends TaskMessage implements iRun
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