<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\Items;
use Authority\Eloquent\Prod;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Carbon\Carbon;

class OnVeryOldHiddenProd extends TaskMessage implements iRun
{

    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;
        $prod = Prod::where('updated_at', '<', new Carbon('last year'))
            ->where('mode_id', '=', 1)
            ->get(['id', 'ic_all']);

        if (count($prod) > 0) {
            foreach ($prod as $row) {

                $item = Items::where('updated_at', '<', new Carbon('last year'))
                    ->where('prod_id', '=', $row->id)
                    ->count();

                if ($item > 0 && $item = $row->ic_all) {
                     Prod::destroy($row->id);
                }
            }
        }
        $this->addMessage("Smazáno produktů skrytých více než rok: <b>" . $count . "</b>");
    }
}