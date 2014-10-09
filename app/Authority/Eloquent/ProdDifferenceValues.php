<?php

namespace Authority\Eloquent;

class ProdDifferenceValues extends \Eloquent
{
    protected $table = 'prod_difference_values';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'set_id' => 'required|exists:prod_difference_set,id',
        'name'   => 'required',
    ];

}