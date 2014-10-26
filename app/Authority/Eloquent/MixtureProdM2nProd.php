<?php namespace Authority\Eloquent;

class MixtureProdM2nProd extends \Eloquent
{
    protected $table = 'mixture_prod_m2n_prod';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'mixture_prod_id' => 'required|exists:mixture_prod,id',
        'prod_id'         => 'required|exists:prod,id'
    ];


}