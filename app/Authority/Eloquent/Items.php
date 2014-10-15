<?php namespace Authority\Eloquent;

class Items extends \Eloquent {

	protected $table = 'items';
	protected $guarded = [];

	public function itemsSale()
	{
		return $this->hasOne('Authority\Eloquent\ItemsSale', 'id', 'sale_id');
	}

	public function itemsAvailability()
	{
		return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'availability_id');
	}

}