<?php namespace Authority\Eloquent;

class MixtureItem extends \Eloquent
{
    protected $table = 'mixture_item';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|min:24|max:160|unique:mixture_item,name'
    ];

    public function prod()
    {
        return $this->belongsToMany('Authority\Eloquent\Item', 'mixture_item_m2n_item', 'mixture_item_id', 'item_id');
    }

}