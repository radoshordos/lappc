<?php

use Authority\Web\Group\iProdList;
use Authority\Web\Group\TreeMaster;
use Authority\Eloquent\ViewTree;

class TreeListController extends EshopController
{
	public function ajajtree()
	{
		$tm = new TreeMaster();
		$tm->setDevActual(NULL, Input::get('dev'));
		$tm->setViewTreeActual(NULL, Input::get('tree'));
		$res = $tm->detectTree();
		$res->ajajSort(Input::get('sort'));
		$res->ajajAction(Input::get('action'));
//		$res->ajajDev(Input::get('dev'));

		var_dump($res->toDebugSql());

		return View::make('web.tree.boxprodlist', [
			'dev_actual'       => $res->getDevActual(),
			'view_tree_actual' => $res->getViewTreeActual(),
			'view_prod_array'  => $res->getViewProdPagination(),
			'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
		]);
	}

}