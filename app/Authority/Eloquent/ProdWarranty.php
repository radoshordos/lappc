<?php

namespace Authority\Eloquent;

class ProdWarranty extends \Eloquent
{
    protected $table = 'prod_warranty';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = array(
        'name' => 'required',
    );

}