<?php

namespace Authority\Runner\Task\Ppc;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\PpcDb;
use Authority\Eloquent\PpcKeywords;

class KeywordDb extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {

        $i=0;
        $ppc_db = new PpcDb();
        $all = $ppc_db::all();



        foreach ($all as $row) {

            //$keyword = new PpcKeywords();
            $bool = PpcKeywords::where('item_id', '=', $row->item_id)->get();

            $this->addMessage($bool);

            //$user = User::find('item_id' => 1);


            /*
                        $keyword->item_id = $i++;
                        $keyword->match_id = 1;
                        $keyword->name = $row->name;
                        $keyword->cpc = 20;
            */
        }
    }
}