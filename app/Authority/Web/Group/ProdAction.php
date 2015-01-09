<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdAction extends AbstractTree implements iProdList {

	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($url, $dev_actual = NULL)
	{
		// TODO: Implement __construct() method.
	}

	public function getViewTreeActual()
	{
		return ViewTree::where('tree_group_type', '=', 'prodaction')->first();
	}

	public function getDevList($dev = NULL)
	{
		$vp = ViewProd::where('prod_mode_id', '=', '4');
		if (!empty($dev)) {
			$vp->where('dev_alias', '=', $dev);
		}
		return $vp->get()->toArray();
	}

	public function getViewProdPagination($dev = NULL)
	{
		// TODO: Implement getViewProdPagination() method.
	}
}