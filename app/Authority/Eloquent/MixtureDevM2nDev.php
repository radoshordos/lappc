<?php

namespace Authority\Eloquent;

class MixtureDevM2nDev extends \Eloquent
{
    protected $table = 'mixture_dev_m2n_dev';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'mixture_dev_id' => 'required|exists:mixture_dev,id',
        'dev_id' => 'required|exists:dev,id',
    );
/*
    public function dev()
    {
        return $this->hasMany('Authority\Eloquent\Dev', 'id', 'dev_id');
    }
*/
}