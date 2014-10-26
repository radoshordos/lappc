<?php namespace Authority\Eloquent;

class MixtureProd extends \Eloquent
{
    protected $table = 'mixture_prod';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|min:24|max:160|unique:mixture_dev,name'
    ];

    public function prod()
    {
        return $this->belongsToMany('Authority\Eloquent\Prod', 'mixture_prod_m2n_prod', 'mixture_prod_id', 'prod_id');
    }

}