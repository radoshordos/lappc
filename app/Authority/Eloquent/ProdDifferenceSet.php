<?php

namespace Authority\Eloquent;

class ProdDifferenceSet extends \Eloquent
{
    protected $table = 'prod_difference_set';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'name' => 'required',
    ];

}