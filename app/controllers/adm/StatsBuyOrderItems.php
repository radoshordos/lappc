<?php

use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\MixtureDev;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Tools\SB;

class StatsBuyOrderItems extends \BaseController
{
    public function index()
    {
        $input = Input::all();

        $clear = [
            'month_start'        => isset($input['month_start']) ? $input['month_start'] : NULL,
            'month_end'          => isset($input['month_end']) ? $input['month_end'] : date('Y-m'),
            'choice_mixture_dev' => isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL
        ];

        if (Input::has('submit-buyorderitems')) {
            $bodi = BuyOrderDbItems::selectRaw("prod.name,COUNT(*) AS count_item")
                ->leftJoin('items', 'buy_order_db_items.item_id', '=', 'items.id')
                ->leftJoin('prod', 'items.prod_id', '=', 'prod.id')
                ->whereNotNull('prod.id')
                ->whereNotNull('buy_order_db_items.order_id')
                ->groupBy('buy_order_db_items.item_id')
                ->orderByRaw("count_item DESC, prod.name ASC");

            if (!empty($clear['month_start'])) {
                $bodi->where('buy_order_db_items.created_at', '>=', $clear['month_start']);
            }

            if (!empty($clear['month_end'])) {
                $bodi->where('buy_order_db_items.created_at', '<=', $clear['month_end']);
            }

            if (intval($clear['choice_mixture_dev']) > 0) {
                $bodi->whereIn('prod.dev_id', MixtureDevM2nDev::where('mixture_dev_id', '=', $clear['choice_mixture_dev'])->lists('dev_id'));
            }
        }

        return View::make('adm.stats.buyorderitems.index', [
            'min_insert_month'   => BuyOrderDbItems::selectRaw('DATE_FORMAT(FROM_UNIXTIME(MIN("created_at")), "%Y-%m") AS min_insert_month')->pluck('min_insert_month'),
            'select_mixture_dev' => SB::optionEloqent(MixtureDev::whereIn('purpose', ['autosimple', 'devgroup', 'autoall'])->orderByRaw('name,id')->get(), ['id' => '->name - [Výrobců &#8721;:->trigger_column_count]'], TRUE),
            'choice_month_start' => $clear['month_start'],
            'choice_month_end'   => $clear['month_end'],
            'choice_mixture_dev' => $clear['choice_mixture_dev'],
            'buy_order_db_items' => (Input::has('submit-buyorderitems')) ? $bodi->get() : NULL
        ]);
    }
}