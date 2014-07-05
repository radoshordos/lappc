<?php

namespace Authority\Runner\Task\Recalculate;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class Tree extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        \DB::statement('CALL proc_tree_recalculate');
        $this->addMessage("Zavolán přepočet skupin (TREE)");
    }
}