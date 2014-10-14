<?php

namespace Authority\Eloquent;

class MixtureDevM2nDev extends \Eloquent
{
    protected $table = 'mixture_dev_m2n_dev';
    protected $guarded = [];
    public $timestamps = FALSE;

    public static $rules = [
        'mixture_dev_id' => 'required|exists:mixture_dev,id',
        'dev_id'         => 'required|exists:dev,id'
    ];

}