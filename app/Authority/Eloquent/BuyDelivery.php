<?php namespace Authority\Eloquent;

class BuyDelivery extends \Eloquent
{
	protected $table = 'buy_delivery';
	protected $guarded = [];

	public $timestamps = FALSE;

	public static $rules = [];
}