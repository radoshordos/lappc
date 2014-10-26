<?php namespace Authority\Eloquent;

class MixtureTree extends \Eloquent
{
    protected $table = 'mixture_tree';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|min:2|max:32|unique:mixture_dev,name'
    ];

    public function tree()
    {
        return $this->belongsToMany('Authority\Eloquent\Tree', 'mixture_tree_m2n_tree', 'mixture_tree_id', 'tree_id');
    }

}