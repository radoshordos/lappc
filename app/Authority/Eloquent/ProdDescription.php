<?php

namespace Authority\Eloquent;

class ProdDescription extends \Eloquent
{
    protected $table = 'prod_description';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
    ];
}