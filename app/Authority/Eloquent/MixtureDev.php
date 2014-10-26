<?php namespace Authority\Eloquent;

class MixtureDev extends \Eloquent
{
    protected $table = 'mixture_dev';
    protected $guarded = [];
    public $timestamps = FALSE;

    public static $rules = [
        'name' => 'required|min:24|max:160|unique:mixture_dev,name'
    ];

    public function dev()
    {
        return $this->belongsToMany('Authority\Eloquent\Dev', 'mixture_dev_m2n_dev', 'mixture_dev_id', 'dev_id');
    }

}