<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Dev;
use Authority\Eloquent\Items;
use Authority\Eloquent\MixtureItem;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Web\Query\AjaxTree;
use Authority\Mapper\ViewProdMapper;
use Authority\Mapper\ViewProdWorker;


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
		$view_prod_actual = ViewProd::where('prod_alias', '=', $urlPart)->first();
		if (isset($view_prod_actual) && $view_prod_actual->count() > 0) {

			$at_row = (intval($view_prod_actual->akce_template_id) > 1 ? AkceTempl::find($view_prod_actual->akce_template_id) : NULL);

			$item_row = NULL;
			if ($view_prod_actual->prod_ic_visible == 1) {
				$item_row = Items::where('prod_id', '=', $view_prod_actual->prod_id)->first();
			}

			return View::make('web.prod', [
				'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
				'view_tree_actual' => ViewTree::where('tree_id', '=', $view_prod_actual->tree_id)->first(),
				'view_prod_actual' => $view_prod_actual,
				'prod_desc_array'  => ProdDescription::where('prod_id', '=', $view_prod_actual->prod_id)->whereNotNull('data')->get(),
				'term'             => Input::get('term'),
				'at_row'           => $at_row,
				'item_row'         => $item_row,
				'mi_row'           => ((isset($at_row) && intval($at_row->mixture_item_id) > 0) ? MixtureItem::find(intval($at_row->mixture_item_id)) : NULL)
			]);
		}

		return NULL;
	}

	protected function isTreeWithDev(array $treePart, $dev)
	{
		$dev_actual = Dev::where('alias', '=', $dev)->cacheTags('alias')->first();
		if (isset($dev_actual) && $dev_actual->count() > 0) {
			return $this->isTree($treePart, $dev_actual);
		}
		return $this->isTree(array_merge($treePart, [$dev]));
	}


	protected function isTree(array $treePart, $dev = NULL)
	{
		$tree_actual = ViewTree::where('tree_absolute', '=', implode('/', $treePart))->first();
		$term = Input::get('term');

		if (isset($tree_actual) && $tree_actual->count() > 0) {

			$sort = NULL;

			if (isset($dev) && $dev->count() > 0) {
				$vp = ViewProd::whereBetween('tree_id', [$tree_actual->tree_id, ($tree_actual->tree_id + 9999)])->where('dev_id', '=', $dev->id);
			} else {
				$vp = ViewProd::whereBetween('tree_id', [$tree_actual->tree_id, ($tree_actual->tree_id + 9999)]);
			}

			if (Session::has('tree.sort')) {
				$sort = Session::get('tree.sort');
			}

			$ajaxTree = new AjaxTree();
			$vp = $ajaxTree->orderBySort($vp, $sort);

			$pagination = $vp->where('prod_mode_id', '>', '1')->paginate(18);

			if (!empty($term)) {
				$pagination->appends(['term' => $term]);
			}

			return View::make('web.tree', [
				'view_prod_array'  => $pagination,
				'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
				'view_tree_actual' => $tree_actual,
				'db_dev'           => $dev,
				'dev_list'         => TreeDev::select(["tree_dev.subdir_visible AS dev_prod_count", "tree.absolute AS tree_absolute", "dev.alias AS dev_alias", "dev.name AS dev_name", "dev.id AS dev_id"])->join('dev', 'tree_dev.dev_id', '=', 'dev.id')->join('tree', 'tree_dev.tree_id', '=', 'tree.id')->where('tree_id', '=', $tree_actual->tree_id)->where('subdir_visible', '>', 0)->get()->toArray(),
				'term'             => $term,
				'store'            => Input::has('store') ? true : false,
				'action'           => Input::has('action') ? true : false,
			]);
		}
		return NULL;
	}

}