<?php namespace Authority\Web\Group;

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;

class ProdFind extends AbstractTree implements iProdListable, iProdExpandable
{
	CONST TREE_GROUP_TYPE = 'prodfind';
	CONST TREE_BLADE_TEMPLATE = 'web.vyhledavani';

	private $et;
	private $clt;

	public function __construct($url = NULL, $dev_actual = NULL)
	{
		$this->term = strip_tags(trim(\Input::get('term')));
		$this->et = explode(" ", $this->term);
		$this->clt = $this->cutLongerTerm($this->term);
		$this->url = $url;
		$this->dev_actual = $dev_actual;
		$this->vta = ViewTree::where('tree_id', '=', 15000000)->first();
	}

	public function getViewProdPagination()
	{

				var_dump($this->dev_actual);
				die;


		$term = $this->term;
		$et = $this->et;
		$clt = $this->clt;
		$vp = ViewProd::whereRaw('0=1');
		$dev = $this->dev_actual;

		$vp->orWhere(function ($query) use ($et, $dev) {
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
			$vp->orWhere(function ($query) use ($clt, $dev) {
				$query->where('prod_desc', 'LIKE', "%" . $clt . "%");
				if (!empty($dev)) {
					$query->where('dev_alias', '=', $dev);
				}
			});
		}

		if (count($et) == 1 && strlen($term) > 3) {
			if (strlen($term) <= 4) {
				$vp->orWhere('prod_search_codes', 'LIKE', $term . "%")->orWhere('prod_search_alias', 'LIKE', $term . "%");
				if (!empty($dev)) {
					$vp->where('dev_alias', '=', $dev);
				}
			} else if (strlen($term) > 4) {
				$vp->orWhere('prod_search_codes', 'LIKE', "%" . $term . "%")->orWhere('prod_search_alias', 'LIKE', "%" . $term . "%");
				if (!empty($dev)) {
					$vp->where('dev_alias', '=', $dev);
				}
			}
		}

		$pagination = $vp->paginate(iProdListable::PAGINATE_PAGE);
		if (!empty($term)) {
			$pagination->appends(['term' => $term]);
		}
		return $pagination;
	}

	public function getDevList()
	{
		$term = $this->term;
		$et = $this->et;
		$clt = $this->clt;

		$dl = ViewProd::select(["dev_id", "dev_alias", "dev_name", "tree_absolute", \DB::raw("COUNT(prod_id) AS dev_prod_count")])->whereRaw('0=1');

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

		$dev_list = $dl->groupBy(["dev_id"])->get()->toArray();
		return ["a" => ['dev_id' => 1, 'dev_alias' => '', 'tree_absolute' => '', 'dev_prod_count' => $this->getCountAllDev($dev_list)]] + $dev_list;
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

	private function getCountAllDev($dev_list)
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