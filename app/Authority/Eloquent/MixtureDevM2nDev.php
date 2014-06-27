<?php

namespace Authority\Eloquent;

class MixtureDevM2nDev extends \Eloquent
{
    protected $table = 'mixture_tree_m2n_tree';
    protected $guarded = [];
    public $timestamps = false;
    public static $rules = array();

    public function dev()
    {
        return $this->hasMany('Authority\Eloquent\Dev', 'id', 'dev_id');
    }

}