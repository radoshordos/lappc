<?php

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeText;
use Authority\Eloquent\ViewTree;
use Authority\Eloquent\TreeGroup;

class Url01Controller extends EshopController
{
    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    public function show($url01)
    {
        $tree = Tree::where('absolute', '=', $url01)->whereBetween('group_id', [50, 59])->first();
        if (!empty($tree)) {
            return View::make('web.text', [
                'namespace'     => 'text',
                'buy_box_price' => $this->buyBoxPrice(),
                'view_tree'     => ViewTree::where('tree_id', '=', 10000000)->first(),
                'tree_group'    => TreeGroup::where('type', '=', 'prodlist')->get(),
                'term'          => Input::get('term'),
                'tree_text'     => TreeText::where('tree_id', '=', $tree->id)->first()
            ]);
        }

        $text = $this->isText($url01);
        return (!is_null($text)) ? $text : $this->isTree([$url01]);
    }
}