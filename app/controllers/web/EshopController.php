<?php

use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class EshopController extends Controller
{
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }


    protected function isProudct($urlPart)
    {
        $row = ViewProd::where('prod_alias', '=', $urlPart)->first();
        if (isset($row) && $row->count() > 0) {
            return $urlPart . " JE produkt";
        }
    }

    protected function isTreeWithProd(array $treePart)
    {

    }

    protected function isTree(array $treePart) {

        $row = ViewTree::where('tree_absolute', '=', implode('/', $treePart))->first();
        if (isset($row) && $row->count() > 0) {
            return View::make('web.tree', [
                'view_tree' => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
                'view_prod' => ViewProd::whereBetween('tree_id', [$row->tree_id, ($row->tree_id + 9999)])->get(),
                'dev_list'  => TreeDev::where('tree_id', '=', $row->tree_id)->where('subdir_visible', '>', 0)->get(),
                'term'      => Input::get('term')
            ]);
        }
    }

}