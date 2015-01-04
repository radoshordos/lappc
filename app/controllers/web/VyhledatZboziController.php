<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class VyhledatZboziController extends EshopController
{
	private $sid;

	public function __construct()
	{
		$this->sid = Session::getId();
	}

	private function cutLongerTerm($term)
	{
		if (strlen($term) > 7) {
			return substr($term, 0, -2);
		} else if (strlen($term) > 4) {
			return substr($term, 0, -1);
		} else {
			return $term;
		}
	}

	public function index($dev = NULL)
	{
		$term = strip_tags(trim(Input::get('term')));
		$et = explode(" ", $term);
		$clt = $this->cutLongerTerm($term);

		$dl = ViewProd::select(["dev_id", "dev_alias", "dev_name", "tree_absolute", DB::raw("COUNT(prod_id) AS dev_prod_count")])->whereRaw('0=1');
		$vp = ViewProd::whereRaw('0=1');

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

		$vp->orWhere(function ($query) use ($et,$dev) {
			foreach ($et as $word) {
				if (strlen($word) > 7) {
					$query->where('prod_name', 'LIKE', $word . '%');
				} else if (strlen($word) >= 1) {
					$query->where('prod_name', 'LIKE', '%' . $word . '%');
				} else {
					$query->where('prod_name', 'LIKE', $word);
				}
				if (!empty($dev)) {
					$query->where('dev_alias', '=', $dev);
				}
			}
		});


		if (strlen($clt) > 4) {
			$dl->orWhere(function ($query) use ($clt,$dev) {
				$query->where('prod_desc', 'LIKE', "%" . $clt . "%");
			});
			$vp->orWhere(function ($query) use ($clt,$dev) {
				$query->where('prod_desc', 'LIKE', "%" . $clt . "%");
				if (!empty($dev)) {
					$query->where('dev_alias', '=', $dev);
				}
			});
		}

		if (count($et) == 1 && strlen($term) > 3) {
			if (strlen($term) <= 4) {
				$dl->orWhere('prod_search_codes', 'LIKE', $term . "%")->orWhere('prod_search_alias', 'LIKE', $term . "%");
				$vp->orWhere('prod_search_codes', 'LIKE', $term . "%")->orWhere('prod_search_alias', 'LIKE', $term . "%");
				if (!empty($dev)) {
					$vp->where('dev_alias', '=', $dev);
				}
			} else if (strlen($term) > 4) {
				$dl->orWhere('prod_search_codes', 'LIKE', "%" . $term . "%")->orWhere('prod_search_alias', 'LIKE', "%" . $term . "%");
				$vp->orWhere('prod_search_codes', 'LIKE', "%" . $term . "%")->orWhere('prod_search_alias', 'LIKE', "%" . $term . "%");
				if (!empty($dev)) {
					$vp->where('dev_alias', '=', $dev);
				}
			}
		}

		$dev_list = $dl->groupBy(["dev_id"])->get()->toArray();
		$pagination = $vp->paginate(self::PAGINATE_PAGE);

		if (!empty($term)) {
			$pagination->appends(['term' => $term]);
		}

		return View::make('web.vyhledavani', [
			'namespace'        => 'vyhledavani',
			'dev'              => $dev,
			'view_prod_array'  => $pagination,
			'view_tree_array'  => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
			'view_tree_actual' => ViewTree::where('tree_group_type', '=', 'prodfind')->first(),
			'dev_list'         => ["a" => ['dev_id' => 1, 'dev_alias' => '', 'tree_absolute' => '', 'dev_prod_count' => $this->getCountAllDev($dev_list)]] + $dev_list,
			'vp'               => ViewProd::where('prod_name', 'LIKE', '%' . Input::get('term') . '%')->first(),
			'term'             => Input::get('term'),
			'store'            => Input::has('store') ? true : false,
			'action'           => Input::has('action') ? true : false,
		]);
	}

	public function store()
	{
		return Redirect::action('VyhledatZboziController@index');
	}

	public function getCountAllDev($dev_list)
	{
		$count = 0;
		if (!empty($dev_list)) {
			foreach ($dev_list as $val) {
				$count += $val['dev_prod_count'];
			}
		}
		return $count;
	}
}