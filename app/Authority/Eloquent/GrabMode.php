<?php namespace Authority\Eloquent;

class GrabMode extends \Eloquent
{

    protected $table = 'grab_mode';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'alias' => 'required',
        'name'  => 'required'
    ];

}