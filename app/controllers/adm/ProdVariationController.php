<?php

use Authority\Eloquent\ProdDifferenceValues;
use Authority\Tools\SB;

class ProdVariationController extends \BaseController
{

    public function index()
    {

        $choice_prod_difference = intval(Input::get('select_difference_set'));

        return View::make('adm.pattern.prodvariation.index', [
            'choice_difference_set'  => $choice_prod_difference,
            'select_difference_set'  => [''] + SB::option("SELECT * FROM prod_difference_set WHERE visible = 1 AND id > 1", ['id' => '->name']),
            'prod_difference_values' => ProdDifferenceValues::where('set_id', '=', $choice_prod_difference)->orderBy('id')->get()
        ]);
    }

    public function store()
    {
        //    var_dump(Input::all());
        //    die;
    }
}