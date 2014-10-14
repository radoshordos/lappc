<?php namespace Authority\Eloquent;

class ProdWarranty extends \Eloquent
{
    protected $table = 'prod_warranty';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required',
    ];

}