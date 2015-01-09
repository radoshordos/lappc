<?php namespace Authority\Web\Group;

class ProdNew implements iProdList
{
	CONST TREE_GROUP_TYPE = 'prodnew';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';


	public function __construct($url, array $dev_actual = [])
	{
		// TODO: Implement __construct() method.
	}

	public function getViewTreeActual()
	{
		// TODO: Implement getViewTreeActual() method.
	}

	public function getDevList($dev = NULL)
	{
		// TODO: Implement getDevList() method.
	}

	public function getViewProdPagination($dev = NULL)
	{
		// TODO: Implement getViewProdPagination() method.
	}
}