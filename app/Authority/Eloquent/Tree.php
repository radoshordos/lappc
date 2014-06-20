<?php

namespace Authority\Eloquent;

class Tree extends \Eloquent
{
    protected $table = 'tree';
    protected $guarded = [];

    public static $rules = array(
        'id' => 'required|integer',
        'parent_id' => 'required|integer',
        'position' => 'required|integer',
        'name' => 'required|min:5|max:40',
        'desc' => 'required|min:5|max:80',
        'relative' => 'required|min:5|max:64',
    );

}