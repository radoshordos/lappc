<?php

namespace Authority\Eloquent;

class Dev extends \Eloquent
{
    protected $table = 'dev';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'id'    => 'required|min:1|max:999',
        'name'  => 'required|min:2|max:32',
        'alias' => 'required|min:2|max:32',
        'default_warranty_id'       => 'required|numeric|exists:prod_warranty,id',
        'default_sale_id'           => 'required|numeric|exists:items_sale,id',
        'default_availibility_id'   => 'required|numeric|exists:items_availability,id'
    );

    public function prodWarranty()
    {
        return $this->hasOne('Authority\Eloquent\ProdWarranty', 'id', 'default_warranty_id');
    }

    public function itemsSale()
    {
        return $this->hasOne('Authority\Eloquent\ItemsSale', 'id', 'default_sale_id');
    }

    public function itemsAvailability()
    {
        return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'default_availibility_id');
    }
}