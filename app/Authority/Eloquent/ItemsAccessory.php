<?php namespace Authority\Eloquent;

class ItemsAccessory extends \Eloquent
{
	protected $table = 'items_accessory';
	protected $guarded = [];

	public $timestamps = false;

	public function fromItems()
	{
		return $this->hasOne('Authority\Eloquent\Items', 'id', 'item_from_id');
	}

	public function toItems()
	{
		return $this->hasOne('Authority\Eloquent\Items', 'id', 'item_to_id');
	}

}