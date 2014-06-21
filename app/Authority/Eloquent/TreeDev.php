<?php

namespace Authority\Eloquent;

class TreeDev extends \Eloquent
{
    protected $table = 'tree_dev';
    protected $guarded = [];
    public $timestamps = false;
    public static $rules = array();
}