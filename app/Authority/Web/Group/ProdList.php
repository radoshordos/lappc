<?php namespace Authority\Web\Group;

use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdList extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodlist';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	private $url;
	private $vta;

	public function initViewTreeActual($url)
	{
		$this->url = $url;
		if (!empty($this->url)) {
			$this->vta = ViewTree::where('tree_absolute', '=', $this->url)->first();
		}
	}

	public function getViewTreeActual()
	{
		return $this->vta;
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

	public function getViewProdPagination($dev = NULL)
	{
		$pagination = NULL;
		if (isset($this->vta) && $this->vta->count() > 0) {
			if (isset($dev) && $dev->count() > 0) {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta->tree_id, ($this->vta->tree_id + 9999)])->where('dev_id', '=', $dev->id);
			} else {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta->tree_id, ($this->vta->tree_id + 9999)]);
			}

			$pagination = $vp->where('prod_mode_id', '>', '1')->paginate(iProdListable::PAGINATE_PAGE);

		}
		return $pagination;
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