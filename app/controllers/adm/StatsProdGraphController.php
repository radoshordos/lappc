<?php

use \Authority\Eloquent\Prod;
use \Authority\Eloquent\TreeGroup;
use \Authority\Eloquent\ProdMode;

class StatsProdGraphController extends \BaseController
{
    public function index()
    {
        return View::make('adm.stats.prodgraph.index', [
            'prod_count_all'      => Prod::all()->count(),
            'tree_group_for_prod' => TreeGroup::where('for_prod', '=', 1)->where('visible', '=', 1)->get(['id', 'name']),
            'prod_mode'           => ProdMode::orderBy('id')->get(['name'])
        ]);
    }
}