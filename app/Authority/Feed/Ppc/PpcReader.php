<?php

namespace Authority\Feed\Ppc;

use Authority\Eloquent\PpcDb;

class PpcReader
{

    protected $count = 0;
    protected $arr = array();

    public function __construct($xmlSource)
    {
        $xml = simplexml_load_string($xmlSource);
        if ($xml) {
            foreach ($xml as $val) {
                $col = new PpcItems($val);

                var_dump($col->getAllArray());
                die;

                $v = Validator::make($col->getAllArray(), PpcDb::$rules);

                if ($v->passes()) {
                    $pdb = new PpcDb;
                    $pdb->item_id = $col->getItemId();
                    $pdb->name = $col->getProduct();
                    $pdb->price = $col->getPriceVat();
                    $pdb->save();

                }
            }
        }
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getArr()
    {
        return $this->arr;
    }

}