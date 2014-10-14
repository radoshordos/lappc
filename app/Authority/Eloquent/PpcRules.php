<?php namespace Authority\Eloquent;

class PpcRules extends \Eloquent
{

    protected $table = 'ppc_rules';
    protected $guarded = [];

    public static $rules = [
        'modes' => 'required'
    ];

}