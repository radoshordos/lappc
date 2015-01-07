<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;

class ProdList implements iProdList
{

	public function __construct() {

	}

	public function getDevList()
	{

		$dl = ViewProd::select(["dev_id", "dev_alias", "dev_name", "tree_absolute", DB::raw("COUNT(prod_id) AS dev_prod_count")])->whereRaw('0=1');

		$dl->orWhere(function ($query) use ($et) {
			foreach ($et as $word) {
				if (strlen($word) > 7) {
					$query->where('prod_name', 'LIKE', $word . '%');
				} else if (strlen($word) >= 1) {
					$query->where('prod_name', 'LIKE', '%' . $word . '%');
				} else {
					$query->where('prod_name', 'LIKE', $word);
				}
			}
		});

		if (strlen($clt) > 4) {
			$dl->orWhere(function ($query) use ($clt, $dev) {
				$query->where('prod_desc', 'LIKE', "%" . $clt . "%");
			});
		}

		if (count($et) == 1 && strlen($term) > 3) {
			if (strlen($term) <= 4) {
				$dl->orWhere('prod_search_codes', 'LIKE', $term . "%")->orWhere('prod_search_alias', 'LIKE', $term . "%");

			} else if (strlen($term) > 4) {
				$dl->orWhere('prod_search_codes', 'LIKE', "%" . $term . "%")->orWhere('prod_search_alias', 'LIKE', "%" . $term . "%");
			}
		}

		return $dl->groupBy(["dev_id"])->get()->toArray();
	}
}