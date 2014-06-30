<?php

namespace Authority\Eloquent;

class PpcRules extends \Eloquent
{

    protected $table = 'ppc_rules';
    protected $guarded = array();

    public static $rules = array(
        'modes' => 'required'
    );

}