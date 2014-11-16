<?php namespace Authority\Eloquent;

class ProdWarranty extends \Eloquent
{
    protected $table = 'prod_warranty';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required',
        'warranty_month' => 'required|min:24|max:1201'
    ];

}