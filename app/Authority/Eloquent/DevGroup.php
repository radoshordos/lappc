<?php

namespace Authority\Eloquent;

class DevGroup extends \Eloquent
{
    protected $table = 'dev_group';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:32|unique:dev_group,name',
    );

}