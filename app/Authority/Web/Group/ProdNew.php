<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdNew extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodnew';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	private $url;
	private $vta;

	public function initViewTreeActual($url)
	{
		$this->url = $url;
		$this->vta = ViewTree::where('tree_id', '=', 19000000)->first();
	}

	public function getViewTreeActual()
	{
		return $this->vta;
	}

	public function getDevList($dev = NULL)
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])
			->where('prod_new', '=', '1')
			->where('prod_mode_id', '>', '1');

		if (!empty($dev)) {
			$vp->where('dev_alias', '=', $dev);
		}
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination($dev = NULL)
	{
		$pagination = NULL;
		$vp = ViewProd::where('prod_new', '=', '1')->where('prod_mode_id', '>', '1');

		$pagination = $vp->paginate(iProdList::PAGINATE_PAGE);
		return $pagination;
	}
}