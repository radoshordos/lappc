<?php namespace Authority\Eloquent;

class MixtureTreeM2nTree extends \Eloquent
{
    protected $table = 'mixture_tree_m2n_tree';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'mixture_tree_id' => 'required|exists:mixture_tree,id',
        'tree_id'         => 'required|exists:tree,id'
    ];

}