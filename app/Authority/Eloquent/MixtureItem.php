<?php namespace Authority\Eloquent;

class MixtureItem extends \Eloquent
{
    protected $table = 'mixture_item';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|min:16|max:160|unique:mixture_item,name'
    ];

    public function items()
    {
        return $this->belongsToMany('Authority\Eloquent\Items', 'mixture_item_m2n_item', 'mixture_item_id', 'item_id');
    }

}