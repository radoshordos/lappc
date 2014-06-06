<?php

namespace Authority\Runner\Task\Ppc;

use Authority\Runner\Task\TaskMessage;

class KeywordDb extends TaskMessage
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->addMessage('test');
        echo $this->getMessage();
    }

}