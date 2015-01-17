<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;

class ProdAction extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodaction';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($view_tree_actual = NULL, $dev_actual = NULL)
	{
		$this->dev_actual = $dev_actual;
		$this->view_tree_actual = $view_tree_actual;
		$this->vp = ViewProd::getQuery();
	}

	public function getDevList()
	{
		$vp = ViewProd::select(["dev_id", "dev_alias", "dev_name", \DB::raw("COUNT(prod_id) AS dev_prod_count")])->where('prod_mode_id', '=', '4');
		return $vp->groupBy('dev_id')->get()->toArray();
	}

	public function getViewProdPagination()
	{
		$this->vp->where('prod_mode_id', '=', '4');
		if (isset($this->dev_actual['id']) && is_int($this->dev_actual['id'])) {
			$this->vp->where('dev_id', '=', $this->dev_actual['id']);
		}
		return $this->vp->paginate(iProdListable::PAGINATE_PAGE);
	}
}