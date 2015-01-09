<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdNew extends AbstractTree implements iProdList
{
	CONST TREE_GROUP_TYPE = 'prodnew';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($url, $dev_actual = NULL)
	{
		// TODO: Implement __construct() method.
	}

	public function getViewTreeActual()
	{
		return ViewTree::where('tree_group_type', '=', 'prodnew')->first();
	}

	public function getDevList($dev = NULL)
	{
		$vp = ViewProd::where('prod_new', '=', '1');
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