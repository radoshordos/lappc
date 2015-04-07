<?php

use Authority\Eloquent\BuyOrderDbItems;
use Authority\Eloquent\MixtureDev;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Tools\SB;

class StatsBuyOrderDevs extends \BaseController
{
    public function index()
    {
        $input = Input::all();

        $clear = [
            'month_start'        => isset($input['month_start']) ? $input['month_start'] : NULL,
            'month_end'          => isset($input['month_end']) ? $input['month_end'] : date('Y-m'),
            'choice_mixture_dev' => isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL
        ];

        if (Input::has('zobrazit')) {
            $bodi = BuyOrderDbItems::selectRaw("item_price")
                ->whereNotNull('buy_order_db_items.order_id')
                ->groupBy('YEAR(buy_order_db_items.created_at), MONTH(buy_order_db_items.created_at)');




            /*
                        SELECT monthname(payment_date) AS Month,
                     year(payment_date) AS Year,
                     sum(total) AS 'Total Order',
                     sum(??) AS 'Total Payment'
                FROM omc_order
            ORDER BY payment_date
            GROUP BY month(payment_date),
                     year(payment_date);

            */

            if (!empty($clear['month_start'])) {
                $bodi->where('buy_order_db_items.created_at', '>=', $clear['month_start']);
            }

            if (!empty($clear['month_end'])) {
                $bodi->where('buy_order_db_items.created_at', '<=', $clear['month_end']);
            }

            if (intval($clear['choice_mixture_dev']) > 0) {
                $bodi->whereIn('buy_order_db_items.prod_dev_id', MixtureDevM2nDev::where('mixture_dev_id', '=', $clear['choice_mixture_dev'])->lists('dev_id'));
            }

            $x = $bodi->get();
            var_dump($x);


        }

        return View::make('adm.stats.buyorderdesvs.index', [
            'min_insert_month'   => BuyOrderDbItems::selectRaw('DATE_FORMAT(FROM_UNIXTIME(MIN("created_at")), "%Y-%m") AS min_insert_month')->pluck('min_insert_month'),
            'select_mixture_dev' => SB::optionEloqent(MixtureDev::whereIn('purpose', ['autosimple', 'devgroup', 'autoall'])->orderByRaw('name,id')->get(), ['id' => '->name - [Výrobců &#8721;:->trigger_column_count]'], TRUE),
            'choice_month_start' => $clear['month_start'],
            'choice_month_end'   => $clear['month_end'],
            'choice_mixture_dev' => $clear['choice_mixture_dev'],
            'buy_order_db_items' => (Input::has('zobrazit')) ? $bodi->get() : NULL
        ]);
    }
}