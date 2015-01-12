<?php namespace Authority\Web\Group;

use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdList extends AbstractTree implements iProdList
{
	CONST TREE_GROUP_TYPE = 'prodlist';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	private $url;
	private $da;
	private $vta;

	public function __construct()
	{
		$this->url = $url;
		$this->da = $dev_actual;
		$this->vta = $this->getViewTreeActual();
	}

	public function getViewTreeActual()
	{
		return ViewTree::where('tree_absolute', '=', $this->url)->first();
	}

	public function getDevList($dev = NULL)
	{
		return TreeDev::select([
			"tree_dev.subdir_visible AS dev_prod_count",
			"tree.absolute AS tree_absolute",
			"dev.alias AS dev_alias",
			"dev.name AS dev_name",
			"dev.id AS dev_id"
		])->join('dev', 'tree_dev.dev_id', '=', 'dev.id')
			->join('tree', 'tree_dev.tree_id', '=', 'tree.id')
			->where('tree_id', '=', $this->vta->tree_id)
			->where('subdir_visible', '>', 0)
			->get()->toArray();
	}
/*
	public function getViewProdPagination($dev = NULL)
	{
		$pagination = NULL;
		if (isset($this->vta) && $this->vta->count() > 0) {
			if (isset($dev) && $dev->count() > 0) {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta->tree_id, ($this->vta->tree_id + 9999)])->where('dev_id', '=', $dev->id);
			} else {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta->tree_id, ($this->vta->tree_id + 9999)]);
			}

			$pagination = $vp->where('prod_mode_id', '>', '1')->paginate(iProdList::PAGINATE_PAGE);

		}
		return $pagination;
	}
*/
	public function setDevId($dev)
	{
		// TODO: Implement setDevId() method.
	}
}

/* AJAX
			$sort = NULL;
			if (Session::has('tree.sort')) {
				$sort = Session::get('tree.sort');
			}
			$ajaxTree = new AjaxTree();
			$vp = $ajaxTree->orderBySort($vp, $sort);
*/