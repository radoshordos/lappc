<?php namespace Authority\Eloquent;

class ProdMode extends \Eloquent
{
    protected $table = 'prod_mode';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required',
    ];

}