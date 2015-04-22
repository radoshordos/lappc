<?php namespace Authority\Web\Group;

abstract class AbstractTree implements iProdListable, iProdExpandable
{
    CONST PAGINATE_PAGEX = 24;

    protected $url;
    protected $tree;
    protected $term;
    protected $sort;
    protected $dev;
    protected $tree_id;

    /* ZDE JE TO OK */

    protected $vp;

    protected $dev_actual;
    protected $view_tree_actual;

    protected $only_store;
    protected $only_action;


    public function setDevId($dev)
    {
        $this->dev = $dev;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function ajajTreeCutting($db, $tree, $deep = 1)
    {
        if (intval($tree) > 0) {
            switch ($deep) {
                case 1:
                    $db->whereBetween('tree_id', [intval($tree), intval($tree) + 9999]);
                    break;
                case 2:
                    $db->whereBetween('tree_id', [intval($tree), intval($tree) + 99]);
                    break;
                default:
                    $db->where('tree_id', '=', intval($tree));
                    break;
            }
        }
    }

    public function ajajDev($dev)
    {
        if (intval($dev) > 0) {
            $this->vp->where('dev_id', intval($dev));
        }
    }

    public function ajajStoreroom($store)
    {
        if ($store == 'true') {
            $this->vp->where('prod_storeroom', '>', 0);
        }
    }

    public function ajajAction($action)
    {
        if ($action == 'true') {
            $this->vp->where('prod_mode_id', '=', 4);
        }
    }

    public function ajajSort($sort)
    {
        if (strlen($sort) > 0 && strlen($sort) < 16) {
            \Session::put('tree.sort', $sort);
        } else {
            $sort = \Session::get('tree.sort');
        }

        if ($sort == 'expensive') {
            return $this->vp->orderBy('prod_search_price', 'DESC');
        } else if ($sort == 'sell') {
            return $this->vp->orderBy('prod_search_sell', 'DESC');
        } else if ($sort == 'fresh') {
            return $this->vp->orderBy('prod_created_at', 'DESC');
        } else {
            return $this->vp->orderBy('prod_search_price', 'ASC');
        }
    }

    public function getViewTreeActual()
    {
        return $this->view_tree_actual;
    }

    public function getDevActual()
    {
        return $this->dev_actual;
    }


    public function toDebugSql()
    {
        return $this->vp->toSql();
    }
}