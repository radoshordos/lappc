<?php namespace Authority\Eloquent;

class BuyTransport extends \Eloquent
{
	protected $table = 'buy_transport';
	protected $guarded = [];

	public $timestamps = FALSE;

	public static $rules = [];
}