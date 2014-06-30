<?php

namespace Authority\Runner\Task\Events;

use Authority\Eloquent\Dev;
use Authority\Eloquent\MixtureDev;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class MixtureOnlyOneDev extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {

        var_dump(Dev::all(array('id')));

        var_dump(MixtureDev::where('purpose', '=', 'autosimple')->get(array('id')));
        die;

    }
}
