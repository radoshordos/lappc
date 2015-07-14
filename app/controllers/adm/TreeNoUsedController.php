<?php

use Authority\Eloquent\Tree;

class TreeNoUsedController extends \BaseController
{
    public function index()
    {

        $section = [16, 19, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 32];

        $nop = Tree::select([
            'tree.id',
            'tree.name',
            'tree.absolute'
        ])
            ->leftJoin('view_tree', 'tree.id', '=', 'view_tree.tree_id')
            ->whereIn('group_id', $section)
            ->whereNull('view_tree.tree_id')
            ->orderBy('tree.id')
            ->get();

        return View::make('adm.summary.treenoused.index', [
            'tree' => $nop
        ]);
    }
}