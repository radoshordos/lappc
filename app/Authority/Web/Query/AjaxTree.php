<?php namespace Authority\Web\Query;

class AjaxTree
{

	public function storeroom()
	{
		$dev = Input::get('dev');
		$tree = Input::get('tree');
		$store = Input::get('store');
		$action = Input::get('action');
		$term = Input::get('term');
		$sort = Input::get('sort');

		if (strlen($sort) > 0 && strlen($sort) < 16) {
			Session::put('tree.sort', $sort);
		} else {
			$sort = Session::get('tree.sort');
		}

		$db = ViewProd::where('prod_mode_id', '>', '1');

		if ($store == 'true') {
			$db->where('prod_storeroom', '>', 0);
		}

		if ($action == 'true') {
			$db->where('prod_mode_id', '=', 4);
		}

		if (intval($tree) > 0) {
			$db->whereBetween('tree_id', [intval($tree), intval($tree) + 9999]);
		}

		if (intval($dev) > 0) {
			$db->where('dev_id', intval($dev));
		}

		$ajaxTree = new AjaxTree();
		$db = $ajaxTree->orderBySort($db, $sort);

		$pagination = $db->limit(self::PAGINATE_PAGE)->paginate();
		$pagination->setBaseUrl('');

		if (!empty($term)) {
			$pagination->appends(['term' => $term]);
		}

		return View::make('web.tree.boxprodlist', [
			"view_prod_array"  => $pagination,
			'view_tree_actual' => ViewTree::where('tree_id', '=', intval($tree))->first(),
		]);
	}

	public function orderBySort($db, $sort = NULL)
	{
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
}