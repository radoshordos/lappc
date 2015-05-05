<?php namespace Authority\Runner\Task\Events;

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Prod;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class OnOldAkceTemplate extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $this->deleteOldActionProducts();
        $this->destroyEmptyActionTemplate();
    }

    public function deleteOldActionProducts()
    {
        $count = 0;
        $res = AkceTempl::join('akce', 'akce_template.id', '=', 'akce.akce_template_id')->whereRaw("DATE(endtime) < DATE(NOW())")->get();
        if (!empty($res)) {
            foreach ($res as $row) {
                $prod = Prod::find($row->akce_prod_id);
                $prod->mode_id = 3;
                $prod->save();
                $count++;
            }
        }
        $this->addMessage("Zrušeno akcí s prošlou šablonou akce: <b>" . $count . "</b>");
    }

    public function destroyEmptyActionTemplate()
    {
        $count = 0;
        $res = AkceTempl::select([
            "akce_template.id AS akce_template_id",
            \DB::raw('COUNT(akce.akce_id) AS count_akce')
        ])->leftJoin('akce', 'akce_template.id', '=', 'akce.akce_template_id')
            ->where('akce_template.id', '>', 1)
            ->groupBy('akce_template.id')
            ->having('count_akce', '=', 0)
            ->get();

        if (!empty($res)) {
            foreach ($res as $row) {
                AkceTempl::destroy($row->akce_template_id);
                $count++;
            }
        }
        $this->addMessage("Zrušeno prázdných šablon akcí: <b>" . $count . "</b>");
    }

}