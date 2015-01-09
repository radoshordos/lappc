<?php namespace Authority\Web\Group;

class ProdAction implements iProdList {

	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';


	public function __construct($url, $dev_actual = NULL)
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