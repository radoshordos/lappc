<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Dev;
use Authority\Eloquent\Items;
use Authority\Eloquent\ItemsAccessory;
use Authority\Eloquent\MixtureItem;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;
use Authority\Web\Group\TreeMaster;
use Authority\Web\Query\AjaxTree;

class EshopController extends BaseController
{
	private $view_tree_array;
	private $term;

	public function __construct()
	{
		$this->view_tree_array = ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get();
		$this->term = Input::get('term');
	}

	protected function setupLayout()
	{
		if (!is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}

	protected function isText($urlPart)
	{
		if (in_array($urlPart, ['kontakt'])) {

			return View::make('web.text', [
				'namespace'       => 'text',
				'view_tree_array' => $this->view_tree_array,
				'term'            => $this->term
			]);
		}
		return NULL;
	}

	protected function isProudct($urlPart)
	{
		$view_prod_actual = ViewProd::where('prod_alias', '=', $urlPart)->first();
		if (isset($view_prod_actual) && $view_prod_actual->count() > 0) {

			$items_accessory = ItemsAccessory::join('items', 'items.id', '=', 'items_accessory.item_to_id')
				->join('view_prod', 'items.prod_id', '=', 'view_prod.prod_id')
				->whereIn('items_accessory.item_from_id', Items::select(["id"])->where('prod_id', '=', $view_prod_actual->prod_id)->lists('id'))
				->where('view_prod.prod_id', '!=', $view_prod_actual->prod_id)
				->get();


			$at_row = (intval($view_prod_actual->akce_template_id) > 1 ? AkceTempl::find($view_prod_actual->akce_template_id) : NULL);

			$item_row = NULL;
			if ($view_prod_actual->prod_ic_visible == 1) {
				$item_row = Items::where('prod_id', '=', $view_prod_actual->prod_id)->first();
			}

			return View::make('web.prod', [
				'namespace'        => 'prod',
				'group'            => 'prod',
				'view_tree_array'  => $this->view_tree_array,
				'view_tree_actual' => ViewTree::where('tree_id', '=', $view_prod_actual->tree_id)->first(),
				'view_prod_actual' => $view_prod_actual,
				'prod_desc_array'  => ProdDescription::where('prod_id', '=', $view_prod_actual->prod_id)->whereNotNull('data')->get(),
				'term'             => $this->term,
				'items_accessory'  => $items_accessory,
				'at_row'           => $at_row,
				'item_row'         => $item_row,
				'mi_row'           => ((isset($at_row) && intval($at_row->mixture_item_id) > 0) ? MixtureItem::find(intval($at_row->mixture_item_id)) : NULL)
			]);
		}
	}

	protected function isTree(array $url, $dev = NULL)
	{
		$tm = new TreeMaster();
		$tm->setUrl($url);
		$tm->setDevAlias($dev);
		$res = $tm->detectTree();

		return (($res === NULL) ? NULL :
			View::make($res::TREE_BLADE_TEMPLATE, [
				'namespace'        => 'tree',
				'group'            => $res::TREE_GROUP_TYPE,
				'dev_list'         => $res->getDevList(),
				'dev_actual'       => $res->getDevArray(),
				'view_tree_actual' => $res->getViewTreeActual(),
				'view_prod_array'  => $res->getViewProdPagination(),
				'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
				'term'             => Input::get('term'),
				'store'            => Input::has('store') ? true : false,
				'action'           => Input::has('action') ? true : false,
			])
		);
	}


	/*
		protected function isTree(array $treePart, $dev = NULL)
		{
			$tm = new TreeMaster($url, $dev);
			return (($tm == NULL) ? NULL : $tm);

			/*

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

				$pagination = $vp->where('prod_mode_id', '>', '1')->paginate(self::PAGINATE_PAGE);

				if (!empty($this->term)) {
					$pagination->appends(['term' => $this->term]);
				}

				return View::make('web.tree', [
					'namespace'        => 'tree',
					'view_prod_array'  => $pagination,
					'view_tree_array'  => $this->view_tree_array,
					'view_tree_actual' => $tree_actual,
					'db_dev'           => $dev,
					'dev_list'         => TreeDev::select(["tree_dev.subdir_visible AS dev_prod_count", "tree.absolute AS tree_absolute", "dev.alias AS dev_alias", "dev.name AS dev_name", "dev.id AS dev_id"])->join('dev', 'tree_dev.dev_id', '=', 'dev.id')->join('tree', 'tree_dev.tree_id', '=', 'tree.id')->where('tree_id', '=', $tree_actual->tree_id)->where('subdir_visible', '>', 0)->get()->toArray(),
					'term'             => $this->term,
					'store'            => Input::has('store') ? true : false,
					'action'           => Input::has('action') ? true : false,
				]);
			}
			return NULL;
		}
	*/
}