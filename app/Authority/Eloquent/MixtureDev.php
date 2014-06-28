<?php

namespace Authority\Eloquent;

class MixtureDev extends \Eloquent
{
    protected $table = 'mixture_dev';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:32|unique:mixture_dev,name',
    );

    public function dev()
    {
        return $this->belongsToMany('Authority\Eloquent\Dev', 'mixture_dev_m2n_dev', 'mixture_dev_id', 'dev_id');
    }

}