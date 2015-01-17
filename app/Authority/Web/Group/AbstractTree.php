<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;

abstract class AbstractTree implements iProdListable, iProdExpandable
{
	CONST PAGINATE_PAGEX = 24;

	protected $url;
	protected $tree;
	protected $term;
	protected $sort;
	protected $dev;
	protected $tree_id;


	protected $dev_actual;
	protected $view_tree_actual;

	protected $only_store;
	protected $only_action;

	/*
		public function getViewProdPagination($dev = NULL)
		{
			$db = ViewProd::where('prod_mode_id', '>', '1');

			$this->ajajStoreroom($db, $this->only_store);
			$this->ajajAction($db, $this->only_action);
			$this->ajajSort($db, $this->sort);
			$this->ajajDev($db, $this->dev);
			$this->ajajTreeCutting($db, $this->tree);

			$pagination = $db->limit(self::PAGINATE_PAGEX)->paginate();
			$pagination->setBaseUrl('');

			if (!empty($term)) {
				$pagination->appends(['term' => $term]);
			}
			return $pagination;
		}
	*/


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
			$db->whereBetween('tree_id', [intval($tree), intval($tree) + 9999]);
		}
	}

	public function ajajDev($db, $dev)
	{
		if (intval($dev) > 0) {
			$db->where('dev_id', intval($dev));
		}
	}

	public function ajajStoreroom($db, $store)
	{
		if ($store == 'true') {
			$db->where('prod_storeroom', '>', 0);
		}
	}

	public function ajajAction($db, $action)
	{
		if ($action == 'true') {
			$db->where('prod_mode_id', '=', 4);
		}
	}

	public function ajajSort($db, $sort)
	{
		if (strlen($sort) > 0 && strlen($sort) < 16) {
			\Session::put('tree.sort', $sort);
		} else {
			$sort = \Session::get('tree.sort');
		}

		if ($sort == 'expensive') {
			return $db->orderBy('prod_search_price', 'DESC');
		} else if ($sort == 'sell') {
			return $db->orderBy('prod_search_sell', 'DESC');
		} else if ($sort == 'fresh') {
			return $db->orderBy('prod_created_at', 'DESC');
		} else {
			return $db->orderBy('prod_search_price', 'ASC');
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
}