<?php namespace Authority\Runner\Task\Clear;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\AkceAvailability;

class UnusedAkceAvailability extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;

        $row = \DB::table('akce_availability AS aa')
            ->select(array('aa.id',
                \DB::raw('COUNT(at.availibility_id) AS availability_count')
            ))
            ->leftJoin('akce_template AS at', 'at.availibility_id', '=', 'aa.id')
            ->where('aa.origin', '=', '0')
            ->groupBy('aa.id')
            ->having('availability_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += AkceAvailability::destroy($val->id);
            }
        }

        $this->addMessage("Odstraněno nevyužitých platností akce : <b>" . $count . "</b>");
    }
}