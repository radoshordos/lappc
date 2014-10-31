<?php

use Authority\Eloquent\RecordMarketSell;

class RecordMarketSellController extends \BaseController
{
    public function index()
    {
        $row = [];
        if (Input::has('submit_month_record')) {
            $row = RecordMarketSell::select([
                '*',
                DB::raw('(SELECT price_all - price_transport) AS result_price_only'),
                DB::raw('(SELECT price_all / count_buy_success) AS result_price_prumer')
            ])
                ->where('month', '>=', Input::get('month-start') . "-01")
                ->where('month', '<=', Input::get('month-end') . "-01")
                ->orderBy('month')
                ->get();
        }

        return View::make('adm.stats.marketsell.index', [
            'source' => $row,
            'choice_month_start' => Input::get('month-start'),
            'choice_month_end'   => Input::get('month-end'),
            'max_insert_month'   => substr(RecordMarketSell::max('month'), 0, 7),
            'min_insert_month'   => substr(RecordMarketSell::min('month'), 0, 7)
        ]);
    }
}



/*

if (!empty($_POST["submit-month-record"])) {



    $sum = $db->fetchRow($db->select()->from("log2market", array(
        "sum_count_row" => "(SELECT COUNT(lm_month))",
        "sum_month_count_buy_all" => "(SELECT SUM(lm_count_buy_all))",
        "sum_month_count_buy_success" => "(SELECT SUM(lm_count_buy_success))",
        "sum_month_price_all" => "(SELECT SUM(lm_price_all))",
        "sum_month_price_only" => "(SELECT SUM(lm_price_all - lm_price_transport))",
        "sum_month_price_transport" => "(SELECT SUM(lm_price_transport))",
    ))
        ->where("lm_month >= ?", $_POST["month-start"] . "-01")
        ->where("lm_month <= ?", $_POST["month-end"] . "-01")
        ->order(array("lm_month")));
}
*/

