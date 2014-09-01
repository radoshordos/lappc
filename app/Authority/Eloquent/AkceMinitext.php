<?php

namespace Authority\Eloquent;

class AkceMinitext extends \Eloquent
{
    protected $table = 'akce_minitext';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:32|unique:akce_minitext,name',
    );

}