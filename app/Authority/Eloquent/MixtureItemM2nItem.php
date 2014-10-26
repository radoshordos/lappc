<?php namespace Authority\Eloquent;

class MixtureItemM2nItem extends \Eloquent
{
    protected $table = 'mixture_item_m2n_item';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'mixture_item_id' => 'required|exists:mixture_item,id',
        'item_id'         => 'required|exists:items,id'
    ];

}