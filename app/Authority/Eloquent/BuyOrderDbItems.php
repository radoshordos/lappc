<?php namespace Authority\Eloquent;

class BuyOrderDbItems extends \Eloquent
{
	protected $table = 'buy_order_db_items';
	protected $guarded = [];

	public $timestamps = TRUE;

	public static $rules = [];

	public function items()
	{
		return $this->hasOne('Authority\Eloquent\Items', 'id', 'item_id');
	}

	public function viewProd()
	{
		return $this->hasOne('Authority\Eloquent\ViewProd', 'prod_id', 'prod_id');
	}
}