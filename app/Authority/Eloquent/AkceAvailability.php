<?php namespace Authority\Eloquent;

class AkceAvailability extends \Eloquent
{
    protected $table = 'akce_availability';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required|min:2|max:168|unique:akce_availability,name',
    ];
}