<?php

use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\MixtureDev;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Tools\SB;

class StatsOrderItems extends \BaseController
{
	public function index()
	{
		if (Input::has('submit-orderitems')) {
			$bodi = BuyOrderDbItems::selectRaw("prod.name,COUNT(*) AS count_item")
				->leftJoin('items', 'buy_order_db_items.item_id', '=', 'items.id')
				->leftJoin('prod', 'items.prod_id', '=', 'prod.id')
				->whereNotNull('prod.id')
				->whereNotNull('buy_order_db_items.order_id')
				->groupBy('buy_order_db_items.item_id')
				->orderByRaw("count_item DESC, prod.name ASC");

			if (!empty(Input::get('day_start'))) {
				$bodi->where('buy_order_db_items.created_at', '>=', Input::get('day_start'));
			}

			if (!empty(Input::get('day_end'))) {
				$bodi->where('buy_order_db_items.created_at', '<=', Input::get('day_end'));
			}

			if (intval(Input::get('select_mixture_dev')) > 0) {
				$bodi->whereIn('prod.dev_id', MixtureDevM2nDev::where('mixture_dev_id', '=', intval(Input::get('select_mixture_dev')))->lists('id'));
			}
		}

		return View::make('adm.stats.orderitems.index', [
			'min_insert_month'   => BuyOrderDbItems::selectRaw('DATE_FORMAT(FROM_UNIXTIME(MIN("created_at")), "%Y-%m-%d") AS min_insert_month')->pluck('min_insert_month'),
			'select_mixture_dev' => SB::optionEloqent(MixtureDev::whereIn('purpose', ['autosimple', 'devgroup'])->orderByRaw('name,id')->get(), ['id' => '->name - [Výrobců &#8721;:->trigger_column_count]'], true),
			'choice_day_start'   => (empty(Input::get('day_start'))) ? NULL : Input::get('day_start'),
			'choice_day_end'     => (empty(Input::get('day_end'))) ? date('Y-m-d') : Input::get('day_end'),
			'choice_mixture_dev' => Input::get('select_mixture_dev'),
			'buy_order_db_items' => (Input::has('submit-orderitems')) ? $bodi->get() : NULL
		]);
	}
}