<?php

namespace Authority\Eloquent;

class Prod_Difference extends \Eloquent
{
    protected $table = 'prod_difference';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'name' => 'required',
    ];

}