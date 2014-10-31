<?php

class RecordMarketSellController extends \BaseController
{
    public function index()
    {
/*
$inc = 0;
$max_insert_month = substr($db->fetchOne($db->select()->from("log2market", array("MAX(lm_month)"))), 0, 7);
$min_insert_month = substr($db->fetchOne($db->select()->from("log2market", array("MIN(lm_month)"))), 0, 7);

if (!empty($_POST["submit-month-record"])) {

    $row = $db->fetchAll($db->select()->from("log2market", array(
            "*",
            "result_price_only" => "(SELECT lm_price_all - lm_price_transport)",
            "result_price_prumer" => "(SELECT lm_price_all / lm_count_buy_success)"
        ))
            ->where("lm_month >= ?", $_POST["month-start"] . "-01")
            ->where("lm_month <= ?", $_POST["month-end"] . "-01")
            ->order(array("lm_month"))
    );

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

    }
}