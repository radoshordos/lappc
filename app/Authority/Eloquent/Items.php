<?php namespace Authority\Eloquent;

class Items extends \Eloquent
{

    protected $table = 'items';
    protected $guarded = [];

    public static $rules = [
        'id'        => 'required|integer',
        'code_prod' => "unique:items,code_prod",
        'code_ean'  => "unique:items,code_ean",
    ];

    public function itemsAvailability()
    {
        return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'availability_id');
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