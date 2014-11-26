<?php namespace Authority\Eloquent;

class ProdDescription extends \Eloquent
{
    protected $table = 'prod_description';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'prod_id' => 'required|exists:prod,id'
    ];
}