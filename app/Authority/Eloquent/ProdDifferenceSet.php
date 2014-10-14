<?php namespace Authority\Eloquent;

class ProdDifferenceSet extends \Eloquent
{
    protected $table = 'prod_difference_set';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'id'     => "required|unique:prod_difference_set,id",
        'name'   => 'required',
        'sortby' => 'required'
    ];


}