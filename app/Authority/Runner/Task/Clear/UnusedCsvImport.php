<?php namespace Authority\Runner\Task\Clear;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\SyncCsvTemplate;


class UnusedCsvImport extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;
        $row = SyncCsvTemplate::where('trigger_column_count','=','0')->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += SyncCsvTemplate::destroy($val->id);
            }
        }

        $this->addMessage("Odstraněno nevyužitých CSV šablon : <b>" . $count . "</b>");
    }
}