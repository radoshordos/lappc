<?php

namespace Authority\Eloquent;

class Dev extends \Eloquent
{
    protected $table = 'dev';
    protected $guarded = [];

    public static $rules = array(
        'id'   => 'required|min:1|max:999|unique:dev,id',
        'name' => 'required|min:2|max:32|unique:dev,name',
        'alias' => 'required|min:2|max:32|unique:dev,alias'
    );

}