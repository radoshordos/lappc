<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Prod;
use Authority\Eloquent\ViewProd;
use Authority\Mapper\ViewProdMapper;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;

class ProdSearchPrice extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $prod_all = ViewProd::all();
        if (!empty($prod_all)) {
            foreach ($prod_all as $pid) {
                $vpm = (new ViewProdMapper)->fetchRow($pid);
                $prod = Prod::find($vpm->getProdId());
                $prod->search_price = $vpm->getPrice();
                $prod->save();
            }
        }
        $this->addMessage("Provedena aktualizace cen pro setřídění");
    }
}