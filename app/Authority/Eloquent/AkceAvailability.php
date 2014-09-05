<?php

namespace Authority\Eloquent;

class AkceAvailability extends \Eloquent
{
    protected $table = 'akce_availability';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:168|unique:akce_availability,name',
    );
}