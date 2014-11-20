<?php namespace Authority\Eloquent;

class Dev extends \Eloquent
{
    protected $table = 'dev';
    protected $guarded = [];
    public $timestamps = FALSE;

    public static $rules = [
        'id'                      => "required|min:1|max:999|unique:dev,id",
        'name'                    => 'required|min:2|max:32|unique:dev,name',
        'alias'                   => 'required|min:2|max:32|unique:dev,alias',
        'default_warranty_id'     => 'required|exists:prod_warranty,id',
        'default_sale_prod_id'    => 'required|exists:prod_sale,id',
        'default_sale_action_id'  => 'required|numeric|exists:items_sale,id',
        'default_availibility_id' => 'required|numeric|exists:items_availability,id'
    ];

    public function prodWarranty()
    {
        return $this->hasOne('Authority\Eloquent\ProdWarranty', 'id', 'default_warranty_id');
    }

    public function prodSaleProd()
    {
        return $this->hasOne('Authority\Eloquent\ProdSale', 'id', 'default_sale_prod_id');
    }

    public function prodSaleAction()
    {
        return $this->hasOne('Authority\Eloquent\ProdSale', 'id', 'default_sale_action_id');
    }

    public function itemsAvailability()
    {
        return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'default_availibility_id');
    }
}