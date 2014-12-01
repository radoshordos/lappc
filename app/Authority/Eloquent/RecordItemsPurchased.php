<?php namespace Authority\Eloquent;

class RecordItemsPurchased extends \Eloquent
{
    protected $table = 'record_items_purchased';
    protected $guarded = [];

    public $timestamps = true;

    public static $rules = [];

    public function items()
    {
        return $this->hasOne('Authority\Eloquent\Items', 'id', 'item_id');
    }

    public function prod()
    {
        return $this->hasOne('Authority\Eloquent\Prod', 'id', 'prod_id');
    }

    public function viewProd()
    {
        return $this->hasOne('Authority\Eloquent\ViewProd', 'prod_id', 'prod_id');
    }
}