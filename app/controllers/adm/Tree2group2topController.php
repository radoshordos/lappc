<?php

use Authority\Eloquent\Tree2group2top;

class Tree2group2topController extends Controller
{
    public function index()
    {
        $tree2group2top = Tree2group2top::all();
        return View::make('adm.summary.tree2group2top.index')->with('tree2group2top', $tree2group2top);
    }

}