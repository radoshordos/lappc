<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class TreeFindController extends EshopController
{
/*
	public function index($dev = NULL)

		return View::make('web.vyhledavani', [
			'namespace'        => 'vyhledavani',
			'dev'              => $dev,
			'view_prod_array'  => $pagination,
			'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
			'view_tree_actual' => ViewTree::where('tree_group_type', '=', 'prodfind')->first(),
			'dev_list'         => ["a" => ['dev_id' => 1, 'dev_alias' => '', 'tree_absolute' => '', 'dev_prod_count' => $this->getCountAllDev($dev_list)]] + $dev_list,
			'vp'               => ViewProd::where('prod_name', 'LIKE', '%' . Input::get('term') . '%')->first(),
			'term'             => Input::get('term'),
			'store'            => Input::has('store') ? true : false,
			'action'           => Input::has('action') ? true : false,
		]);
	}
*/
/*
	public function store()
	{
		return Redirect::action('VyhledatZboziController@index');
	}
*/

}