<?php namespace Authority\Modelx;

use Authority\Eloquent\Tree;

class ModTree
{

    public function updateTreeId($id)
    {
        $arr = [];
        if ($id % 1000000 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 1000000) * 1000000))->pluck('name');
        }
        if ($id % 10000 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 10000) * 10000))->pluck('name');
        }
        if ($id % 100 != 0) {
            $arr[] = Tree::select('name')->where('id', '=', intval(intval($id / 100) * 100))->pluck('name');
        }
        $arr[] = Tree::select('name')->where('id', '=', intval($id))->pluck('name');

        $tree = Tree::find($id);
        $tree->category_text = implode(" | ", $arr);
        $tree->save();
    }

}