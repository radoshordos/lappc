<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdAction extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	private $url;
	private $vta;

	public function __construct($url = NULL, $dev = NULL)
	{
		// TODO: Implement __construct() method.
	}

	public function initViewTreeActual($url)
	{
		$this->url = $url;
		$this->vta = ViewTree::where('tree_id', '=', 16000000)->first();
	}

	public function getViewTreeActual()
	{
		return $this->vta;
	}

	public function getDevList()
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])->where('prod_mode_id', '=', '4');
		if (!empty($dev)) {
			$vp->where('dev_alias', '=', $dev);
		}
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination()
	{
		$pagination = NULL;
		$vp = ViewProd::where('prod_mode_id', '=', '4');
		$pagination = $vp->paginate(iProdList::PAGINATE_PAGE);
		return $pagination;
	}

	public function getDevArray()
	{
		// TODO: Implement getDevArray() method.
	}
}