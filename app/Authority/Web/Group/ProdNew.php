<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdNew extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodnew';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($url = NULL, $dev_actual = NULL)
	{
		$this->url = $url;
		$this->dev_actual = $dev_actual;
		if (!empty($this->url)) {
			$this->vta = ViewTree::where('tree_absolute', '=', $this->url)->first()->toArray();
		}
	}

	public function getDevList()
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])
			->where('prod_new', '=', '1')
			->where('prod_mode_id', '>', '1');

		if (!empty($dev)) {
			$vp->where('dev_alias', '=', $dev);
		}
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination()
	{
		$pagination = NULL;
		if (isset($this->dev_actual) && count($this->dev_actual) > 0) {
			$vp = ViewProd::where('prod_new', '=', '1')->where('prod_mode_id', '>', '1')->where('dev_id', '=', $this->dev_actual['id']);
		} else {
			$vp = ViewProd::where('prod_new', '=', '1')->where('prod_mode_id', '>', '1');
		}

		$pagination = $vp->paginate(iProdListable::PAGINATE_PAGE);
		return $pagination;
	}
}