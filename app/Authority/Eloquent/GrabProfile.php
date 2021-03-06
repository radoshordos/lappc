<?php namespace Authority\Eloquent;

class GrabProfile extends \Eloquent
{

    protected $table = 'grab_profile';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'charset' => 'required|min:2',
        'name'    => 'required|unique:grab_profile,name'
    ];

}