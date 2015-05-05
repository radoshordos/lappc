<?php namespace Authority\Runner\Task\Fix;

use Authority\Runner\Task\iRun;
use Authority\Runner\Task\TaskMessage;
use Authority\Eloquent\Akce;
use Authority\Eloquent\Prod;

class ProdAkceInteraction extends TaskMessage implements iRun
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function run()
    {
        $this->prodWithoutItem();
        $this->prodWithoutAkce();
        $this->akceWithoutTemplate();
    }

    public function prodWithoutItem()
    {
        $count = 0;
        $row = Prod::where('ic_all', '=', '0')->get(['id']);

        if (count($row) > 0) {
            foreach ($row as $val) {
                $count += Prod::destroy($val->id);
            }
        }
        $this->addMessage("Odstraněno produktů bez položek : <b>" . $count . "</b>");
    }

    public function prodWithoutAkce()
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

    public function akceWithoutTemplate()
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