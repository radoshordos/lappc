<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdAction extends AbstractTree implements iProdList
{
	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct()
	{
		// TODO: Implement __construct() method.
	}

	public function setDevId($dev)
	{
		// TODO: Implement setDevId() method.
	}

	public function getViewTreeActual()
	{
		return ViewTree::where('tree_id', '=', 16000000)->first();
	}

	public function getDevList($dev = NULL)
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])->where('prod_mode_id', '=', '4');
		if (!empty($dev)) {
			$vp->where('dev_alias', '=', $dev);
		}
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination($dev = NULL)
	{
		$pagination = NULL;
		$vp = ViewProd::where('prod_mode_id', '=', '4');
		$pagination = $vp->paginate(iProdList::PAGINATE_PAGE);

		if (!empty($this->term)) {
			$pagination->appends(['term' => $this->term]);
		}
		return $pagination;
	}


}