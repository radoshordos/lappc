<?php

use Authority\Eloquent\Dev;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Web\Query\AjaxTree;

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
        $vp = ViewProd::where('prod_alias', '=', $urlPart)->first();
        if (isset($vp) && $vp->count() > 0) {
            return View::make('web.prod', [
                'vp'      => $vp,
                'term'    => Input::get('term'),
                'vt_tree' => ViewTree::where('tree_id', '=', $vp->tree_id)->first(),
                'vt_list' => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
                'pd_list' => ProdDescription::where('prod_id', '=', $vp->prod_id),
            ]);
        }
        return NULL;
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

            $sort = NULL;

            if (isset($dev) && $dev->count() > 0) {
                $vp = ViewProd::whereBetween('tree_id', [$row->tree_id, ($row->tree_id + 9999)])->where('dev_id', '=', $dev->id);
            } else {
                $vp = ViewProd::whereBetween('tree_id', [$row->tree_id, ($row->tree_id + 9999)]);
            }

            if (Session::has('tree.sort'))
            {
                $sort = Session::get('tree.sort');
            }

            $ajaxTree = new AjaxTree();
            $vp = $ajaxTree->orderBySort($vp,$sort);

            return View::make('web.tree', [
                'db_dev'    => $dev,
                'vt_tree'   => $row,
                'vt_list'   => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
                'vp_list'   => $vp->where('prod_mode_id', '>', '1')->paginate(15),
                'dev_list'  => TreeDev::where('tree_id', '=', $row->tree_id)->where('subdir_visible', '>', 0)->get(),
                'term'    => Input::get('term'),
                'store'   => Input::has('store') ? true : false,
                'action'  => Input::has('action') ? true : false,
            ]);
        }
        return NULL;
    }
}