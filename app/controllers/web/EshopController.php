<?php

use Authority\Eloquent\Dev;
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

    protected function isTreeWithDev(array $treePart, $dev)
    {
        $row = Dev::where('alias', '=', $dev)->cacheTags('alias')->first();
        if (isset($row) && $row->count() > 0) {
            return $this->isTree($treePart, $row);
        }
        return $this->isTree(array_merge($treePart, [$dev]));
    }

    protected function isTree(array $treePart, $dev = NULL)
    {
        $row = ViewTree::where('tree_absolute', '=', implode('/', $treePart))->first();

        if (isset($row) && $row->count() > 0) {

            if (isset($dev) && $dev->count() > 0) {
                $vp = ViewProd::whereBetween('tree_id', [$row->tree_id, ($row->tree_id + 9999)])->where('dev_id', '=', $dev->id)->get();
            } else {
                $vp = ViewProd::whereBetween('tree_id', [$row->tree_id, ($row->tree_id + 9999)])->get();
            }

            return View::make('web.tree', [
                'db_dev'    => $dev,
                'view_tree' => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
                'view_prod' => $vp,
                'dev_list'  => TreeDev::where('tree_id', '=', $row->tree_id)->where('subdir_visible', '>', 0)->get(),
                'term'      => Input::get('term')
            ]);
        }
    }
}