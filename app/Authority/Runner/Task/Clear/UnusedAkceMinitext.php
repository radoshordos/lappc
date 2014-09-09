<?php namespace Authority\Runner\Task\Clear;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\AkceMinitext;

class UnusedAkceMinitext extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;

        $row = \DB::table('akce_minitext as am')
            ->select(array('am.id',
                \DB::raw('COUNT(at.minitext_id) as minitext_count')
            ))
            ->leftJoin('akce_template as at', 'at.minitext_id', '=', 'am.id')
            ->where('am.origin','=',0)
            ->groupBy('am.id')
            ->having('minitext_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += AkceMinitext::destroy($val->id);
            }
        }

        $this->addMessage("Odstraněno nevyužitých akčních minitextů : <b>" . $count . "</b>");
    }
}