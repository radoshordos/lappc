<?php namespace Authority\Eloquent;

class GrabProfile extends \Eloquent
{

    protected $table = 'grab_profile';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'charset' => 'required',
        'name'    => 'required'
    ];

}