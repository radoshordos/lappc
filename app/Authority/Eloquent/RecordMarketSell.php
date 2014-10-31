<?php namespace Authority\Eloquent;

class RecordMarketSell extends \Eloquent
{
    protected $table = 'record_market_sell';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'month'             => 'required|unique:record_market_sell,month',
        'count_buy_all'     => 'required|integer',
        'count_buy_success' => 'required|integer',
        'price_all'         => 'required|numeric',
        'price_transport'   => 'required|numeric',
    ];
}