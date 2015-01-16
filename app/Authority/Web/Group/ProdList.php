<?php namespace Authority\Web\Group;

use Authority\Eloquent\Dev;
use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdList extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodlist';
	CONST TREE_BLADE_TEMPLATE = 'web.tree';

	public function __construct($url = NULL, $dev_actual = NULL)
	{
		$this->term = strip_tags(trim(\Input::get('term')));
		$this->url = $url;
		$this->dev_actual = $dev_actual;
		if (!empty($this->url)) {
			var_dump($this->url);
			die;
			$this->vta = ViewTree::where('tree_absolute', '=', $this->url)->first()->toArray();
		}
	}

	public function getDevList()
	{
		return TreeDev::select([
			"tree_dev.subdir_visible AS dev_prod_count",
			"tree.absolute AS tree_absolute",
			"dev.alias AS dev_alias",
			"dev.name AS dev_name",
			"dev.id AS dev_id"
		])->join('dev', 'tree_dev.dev_id', '=', 'dev.id')
			->join('tree', 'tree_dev.tree_id', '=', 'tree.id')
			->where('tree_id', '=', $this->vta['tree_id'])
			->where('subdir_visible', '>', 0)
			->get()->toArray();
	}

	public function getViewProdPagination()
	{
		$pagination = NULL;
		if (isset($this->vta) && is_array($this->vta) && count($this->vta) > 0) {
			if (isset($this->dev_actual) && count($this->dev_actual) > 0) {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta['tree_id'], ($this->vta['tree_id'] + 9999)])->where('dev_id', '=', $this->dev_actual['id']);
			} else {
				$vp = ViewProd::whereBetween('tree_id', [$this->vta['tree_id'], ($this->vta['tree_id'] + 9999)]);
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