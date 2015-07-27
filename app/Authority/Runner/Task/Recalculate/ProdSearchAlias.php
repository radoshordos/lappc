<?php namespace Authority\Runner\Task\Recalculate;

use Authority\Eloquent\Prod;
use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Tools\SF;

class ProdSearchAlias extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $i = 0;
        $prod_all = Prod::select(['id', 'alias'])->get();
        foreach ($prod_all as $row) {
            $prod = Prod::find($row->id);
            $alias = SF::friendlySearch($row->alias);
            if ($prod->search_alias != $alias) {
                $i++;
                $prod->search_alias = $alias;
                $prod->save();
            }
        }
        $this->addMessage("Provedena aktualizace vyhledávacích textů: <b>" . $i . "</b>");
    }
}