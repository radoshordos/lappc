<?php namespace Authority\Runner\Task\Clear;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\ProdWarranty;

class UnusedProdWarranty extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->run();
    }

    public function run()
    {
        $count = 0;

        $row = \DB::table('prod_warranty')
            ->select(array('prod_warranty.id',
                \DB::raw('COUNT(prod.warranty_id) as warranty_count')
            ))
            ->leftJoin('prod', 'prod.warranty_id', '=', 'prod_warranty.id')
            ->groupBy('prod_warranty.id')
            ->having('warranty_count', '=', '0')
            ->get();

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += ProdWarranty::destroy($val->id);
            }
        }

        $this->addMessage("Odstraněno nevyužitých záruk : <b>" . $count . "</b>");
    }
}