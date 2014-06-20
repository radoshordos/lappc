<?php

use Authority\Eloquent\TreeGroupTop;

class TreeGroupTopController extends \BaseController
{
    public function index()
    {
        $tree2group2top = TreeGroupTop::all();
        return View::make('adm.summary.treegrouptop.index')->with('treegrouptop', $tree2group2top);
    }

}