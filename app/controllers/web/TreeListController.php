<?php

use Authority\Web\Group\ProdAction;
use Authority\Web\Group\ProdFind;
use Authority\Web\Group\ProdList;
use Authority\Web\Group\ProdNew;

class TreeListController extends EshopController
{
	private $cd;
	private $sid;

	public function __construct()
	{
		$this->sid = Session::getId();
		$this->cd = initTreeGroup($url);
	}

	public function index($dev = NULL) {

		return View::make('web.vyhledavani', [
			'namespace'        => 'vyhledavani',
			'dev'              => $dev,
			'dev_list'         => $this->cd->getDevList($dev),
			'view_prod_array'  => $this->cd->getViewProdPagination($dev),
			'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
			'view_tree_actual' => ViewTree::where('tree_group_type', '=', 'prodfind')->first(),
			'vp'               => ViewProd::where('prod_name', 'LIKE', '%' . Input::get('term') . '%')->first(),
			'term'             => Input::get('term'),
			'store'            => Input::has('store') ? true : false,
			'action'           => Input::has('action') ? true : false,
		]);
	}

	public function initTreeGroup($url)
	{
		switch ($url) {
			case 'new' :
				return new ProdNew();
			case 'action' :
				return new ProdAction();
			case 'find' :
				return new ProdFind();
			default:
				return new ProdList();
		}
	}
}