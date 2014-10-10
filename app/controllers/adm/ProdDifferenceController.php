<?php

use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\ProdDifferenceSet;

class ProdDifferenceController extends \BaseController
{

    public function index()
    {
        return View::make('adm.pattern.proddifference.index', [
            'prod_difference' => ProdDifference::orderBy('id')->get(),
            'prod_difference_set' => ProdDifferenceSet::orderBy('id')->get()
        ]);
    }


    public function store()
    {
        var_dump(Input::all());
        die;
    }
}