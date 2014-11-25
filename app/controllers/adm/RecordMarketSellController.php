<?php

use Authority\Eloquent\RecordMarketSell;

class RecordMarketSellController extends \BaseController
{
    public function index()
    {
        $row = $sum = [];
        if (Input::has('submit_month_record')) {
            $row = RecordMarketSell::select([
                '*',
                DB::raw('(SELECT price_all - price_transport) AS result_price_only'),
                DB::raw('(SELECT price_all / count_buy_success) AS result_price_prumer'),
            ])
                ->where('month', '>=', Input::get('month-start') . "-01")
                ->where('month', '<=', Input::get('month-end') . "-01")
                ->orderBy('month')
                ->get();

            $sum = RecordMarketSell::select([
                DB::raw('(SELECT COUNT(month)) AS sum_count_row'),
                DB::raw('(SELECT SUM(count_buy_all)) AS sum_month_count_buy_all'),
                DB::raw('(SELECT SUM(count_buy_success)) AS sum_month_count_buy_success'),
                DB::raw('(SELECT SUM(price_all)) AS sum_month_price_all'),
                DB::raw('(SELECT SUM(price_all - price_transport)) AS sum_month_price_only'),
                DB::raw('(SELECT SUM(price_transport)) AS sum_month_price_transport'),
            ])
                ->where('month', '>=', Input::get('month-start') . "-01")
                ->where('month', '<=', Input::get('month-end') . "-01")
                ->orderBy('month')
                ->first();
        }

        return View::make('adm.stats.marketsell.index', [
            'submit' => Input::get('submit_month_record'),
            'source' => $row,
            'sum' => $sum,
            'choice_month_start' => Input::get('month-start'),
            'choice_month_end' => Input::get('month-end'),
            'max_insert_month' => substr(RecordMarketSell::max('month'), 0, 7),
            'min_insert_month' => substr(RecordMarketSell::min('month'), 0, 7)
        ]);
    }
}

