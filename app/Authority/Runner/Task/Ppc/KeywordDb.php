<?php

namespace Authority\Runner\Task\Ppc;

use Authority\Runner\Task\TaskMaker;

class KeywordDb extends TaskMaker
{
    public function __construct($db)
    {
        var_dump($db);

        $this->addMessage('test');
        echo $this->getMessage();
    }

}