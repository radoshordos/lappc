<?php namespace Authority\Eloquent;

class BuyOrderDb extends \Eloquent
{
    protected $table = 'buy_order_db';
    protected $guarded = [];

    public $timestamps = true;

    public static $rules = [];
}