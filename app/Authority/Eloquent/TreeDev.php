<?php

namespace Authority\Eloquent;

class TreeDev extends \Eloquent
{
    protected $table = 'tree_dev';
    protected $guarded = [];
    public $timestamps = FALSE;

    public static $rules = [];

    public function dev()
    {
        return $this->hasOne('Authority\Eloquent\Dev', 'id', 'dev_id');
    }

    public function tree()
    {
        return $this->hasOne('Authority\Eloquent\Tree', 'id', 'tree_id');
    }

}