<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdAction extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($url = NULL, $dev_actual = NULL)
	{

		$this->url = $url;
		$this->dev_actual = $dev_actual;
		$this->vta = ViewTree::where('tree_id', '=', 16000000)->first();
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
		if (isset($this->dev_actual) && count($this->dev_actual) > 0) {
			$vp = ViewProd::where('prod_mode_id', '=', '4')->where('dev_id', '=', $this->dev_actual['id']);
		} else {
			$vp = ViewProd::where('prod_mode_id', '=', '4');
		}
		$pagination = $vp->paginate(iProdListable::PAGINATE_PAGE);
		return $pagination;
	}
}