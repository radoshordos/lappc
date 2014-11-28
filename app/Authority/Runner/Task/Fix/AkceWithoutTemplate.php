<?php namespace Authority\Runner\Task\Fix;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Akce;
use Authority\Eloquent\Prod;

class AkceWithoutTemplate extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;
        $row = Akce::select('akce_id', 'akce_prod_id')
            ->where('akce_template_id', '=', 1)
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $prod = Prod::find($val->akce_prod_id);
                $prod->mode_id = 3;
                $prod->save();
                $count++;
            }
        }
        $this->addMessage("Zrušena akce u akcí bez šablon: <b>" . $count . "</b>");
    }
}