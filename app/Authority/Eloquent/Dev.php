<?php

namespace Authority\Eloquent;

class Dev extends \Eloquent
{
    protected $table = 'dev';
    protected $guarded = [];

    public static $rules = array(
        'id'    => 'required|min:1|max:999|unique:dev,id',
        'name'  => 'required|min:2|max:32|unique:dev,name',
        'alias' => 'required|min:2|max:32|unique:dev,alias'
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