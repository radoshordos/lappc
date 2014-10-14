<?php namespace Authority\Eloquent;

class AkceMinitext extends \Eloquent
{
    protected $table = 'akce_minitext';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required|min:2|max:32|unique:akce_minitext,name'
    ];

}