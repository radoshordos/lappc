<?php

namespace Authority\Eloquent;

class Forex extends \Eloquent
{
    protected $table = 'forex';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = array();

}