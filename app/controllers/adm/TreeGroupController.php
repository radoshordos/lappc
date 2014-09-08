<?php

use Authority\Eloquent\TreeGroup;

class TreeGroupController extends \BaseController
{
    public function index()
    {
        $tree2group2top = TreeGroup::all();
        return View::make('adm.summary.treegroup.index')->with('treegroup', $tree2group2top);
    }

} 