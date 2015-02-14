<?php

use Authority\Eloquent\RecordVisitorsLooking;
use Authority\Eloquent\TreeGroup;
use Authority\Eloquent\ViewTree;
use Carbon\Carbon;

class HomeController extends EshopController
{

	public function show()
	{
		if (Input::has('term')) {
			$counter = RecordVisitorsLooking::where('find_at', '>', new Carbon('last hour'))->where('filter_find', '=', Input::get('term'))->orderBy('id')->count();
			if ($counter == 0) {
				$dt = new DateTime;
				RecordVisitorsLooking::create([
					'find_at'     => $dt->format('Y-m-d H:i:s'),
					'filter_find' => Input::get('term'),
					'count_dev'   => 0,
					'count_prod'  => 0
				]);
			}
		}

		return View::make('web.home', [
			'namespace'       => 'home',
			'buy_box_price'   => $this->buyBoxPrice(),
			'view_tree_array' => ViewTree::whereIn('tree_group_type', ['prodaction', 'prodlist'])->orderBy('tree_id')->get(),
			'tree_group'      => TreeGroup::where('type', '=', 'prodlist')->get(),
			'term'            => Input::get('term')
		]);
	}

}