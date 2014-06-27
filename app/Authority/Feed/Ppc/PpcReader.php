<?php

namespace Authority\Feed\Ppc;

use Authority\Eloquent\PpcDb;

class PpcReader
{
    protected $import_yes = 0;
    protected $import_no = 0;
    protected $arr = array();

    public function __construct($xmlSource)
    {
        $xml = simplexml_load_string($xmlSource);
        if ($xml) {
            foreach ($xml as $val) {
                $col = new PpcItems($val);
                $v = \Validator::make($col->getAllArray(), PpcDb::$rules);
                if ($v->passes()) {
                    $pdb = new PpcDb;
                    $pdb->item_id = $col->getItemId();
                    $pdb->dev_id = $col->getDevId();
                    $pdb->tree_id = $col->getTreeId();
                    $pdb->url = $col->getUrl();
                    $pdb->name = $col->getName();
                    $pdb->price = $col->getPrice();
                    $pdb->market = $col->getMarket();
                    $pdb->action = $col->getAction();
                    $pdb->send = $col->getSend();
                    $pdb->save();
                    $this->import_yes++;
                } else {
                    $this->import_no++;
                  //  echo('NOT IMPORT : ' + $this->import_no);
                }
            }
        }
    }

    public function getImportYes()
    {
        return $this->import_yes;
    }

    public function getImportNo()
    {
        return $this->import_no;
    }

    public function getArr()
    {
        return $this->arr;
    }

}