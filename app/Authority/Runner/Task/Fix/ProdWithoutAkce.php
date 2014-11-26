<?php namespace Authority\Runner\Task\Fix;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Prod;

class ProdWithoutAkce extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;
        $row = Prod::select('prod.id AS id')
            ->leftJoin('akce', 'akce.akce_id', '=', 'prod.id')
            ->where('prod.mode_id', '=', '4')
            ->whereNull('akce.akce_id')
            ->lists('id');

        if (count($row) > 0) {

            foreach ($row as $val) {

                $prod = Prod::find($val);
                $prod->mode_id = 3;
                $prod->save();
                $count++;
            }
        }
        $this->addMessage("Opraveno chybně zakožených akcí : <b>" . $count . "</b>");
    }
}