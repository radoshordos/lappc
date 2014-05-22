<?php

use Authority\Eloquent\Tree2group2top;

class Tree2group2topController extends Controller
{
    public function show()
    {
        $tree2group2top = Tree2group2top::all();
        return View::make('adm.nastaveni.tree2group2top.show')->with('tree2group2top', $tree2group2top);
    }

}