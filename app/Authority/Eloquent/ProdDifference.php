<?php

namespace Authority\Eloquent;

class ProdDifference extends \Eloquent
{
    protected $table = 'prod_difference';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'id' => "required|unique:prod_difference,id",
        'name' => 'required',
    ];

}