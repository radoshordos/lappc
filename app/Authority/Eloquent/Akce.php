<?php namespace Authority\Eloquent;

class Akce extends \Eloquent
{
	protected $table = 'akce';

	protected $guarded = [];
	public $timestamps = TRUE;

	public static $rules = [
		'akce_prod_id'     => 'required|exists:prod,id',
		'akce_sale_id'     => 'required|exists:akce_sale,id',
		'akce_template_id' => 'required|exists:akce_template,id'
	];

	public function akceTemplate()
	{
		return $this->hasOne('Authority\Eloquent\AkceTempl', 'id', 'akce_template_id');
	}

	public function akceSale()
	{
		return $this->hasOne('Authority\Eloquent\AkceSale', 'id', 'akce_sale_id');
	}

	public function akceAvailability()
	{
		return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'akce_availability_id');
	}
}