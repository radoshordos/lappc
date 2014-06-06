<?php

namespace Authority\Eloquent;

class PpcKeywords extends \Eloquent
{

    protected $fillable = [];

    protected $guarded = array();

    public static $rules = array(
        'name' => 'required',
        'cpc' => 'required'
    );

}