<?php namespace Authority\Eloquent;

class BuyPayment extends \Eloquent
{
	protected $table = 'buy_payment';
	protected $guarded = [];

	public $timestamps = FALSE;

	public static $rules = [];
}