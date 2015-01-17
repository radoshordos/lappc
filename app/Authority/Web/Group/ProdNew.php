<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;

class ProdNew extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodnew';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($view_tree_actual = NULL, $dev_actual = NULL)
	{
		$this->view_tree_actual = $view_tree_actual;
		$this->dev_actual = $dev_actual;
	}

	public function getDevList()
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])
			->where('prod_new', '=', '1')
			->where('prod_mode_id', '>', '1');
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination()
	{
		$vp = ViewProd::where('prod_new', '=', '1')->where('prod_mode_id', '>', '1');
		if (isset($this->dev_actual['id']) && is_int($this->dev_actual['id'])) {
			$vp = ViewProd::where('prod_mode_id', '>', '1')->where('dev_id', '=', $this->dev_actual['id']);
		}
		return $vp->paginate(iProdListable::PAGINATE_PAGE);
	}
}