<?php namespace Authority\Web\Query;

class AjaxTree
{
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