<?php

namespace Authority\Eloquent;

class MixtureDev extends \Eloquent
{
    protected $table = 'mixture_dev';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:32|unique:dev_group,name',
    );

    public function dev()
    {
        return $this->belongsToMany('Authority\Eloquent\Dev', 'mixture_tree_m2n_tree', 'mixture_dev_id', 'dev_id');
    }

}