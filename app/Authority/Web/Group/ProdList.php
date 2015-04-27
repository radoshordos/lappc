<?php namespace Authority\Web\Group;

use Authority\Eloquent\TreeDev;
use Authority\Eloquent\ViewProd;

class ProdList extends AbstractTree implements iProdListable, iProdExpandable
{
    CONST TREE_GROUP_TYPE = 'prodlist';
    CONST TREE_BLADE_TEMPLATE = 'web.tree';

    public function __construct($view_tree_actual = NULL, $dev_actual = NULL)
    {
        $this->term = strip_tags(trim(\Input::get('term')));
        $this->view_tree_actual = $view_tree_actual;
        $this->dev_actual = $dev_actual;
        $this->vp = ViewProd::getQuery();
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
            ->where('tree_id', '=', $this->view_tree_actual['tree_id'])
            ->where('subdir_visible', '>', 0)
            ->get()->toArray();
    }

    public function getViewProdPagination()
    {
        $tree_id = intval($this->view_tree_actual['tree_id']);

        switch (intval($this->view_tree_actual['tree_deep'])) {
            case 1:
                $this->vp->whereBetween('tree_id', [$tree_id, ($tree_id + 9999)]);
                break;
            case 2:
                $this->vp->whereBetween('tree_id', [$tree_id, ($tree_id + 99)]);
                break;
            default:
                $this->vp->where('tree_id', '=', $tree_id);
                break;
        }

		$this->vp->where('prod_mode_id', '>', '1');

		if (isset($this->view_tree_actual) && is_array($this->view_tree_actual) && count($this->view_tree_actual) > 0) {
            if (isset($this->dev_actual['id']) && is_int($this->dev_actual['id'])) {
                $this->vp->where('dev_id', '=', $this->dev_actual['id']);
            }
        }
		return $this->vp->paginate(iProdListable::PAGINATE_PAGE);
	}
}