<?php

namespace Authority\Eloquent;

class DevGroup extends \Eloquent
{
    protected $table = 'dev_group';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:2|max:32|unique:dev_group,name',
    );

    public function devM2nGroup()
    {
        return $this->belongsToMany('Authority\Eloquent\Dev','dev_m2n_group','group_id','dev_id');
    }


    public function dev()
    {
        return $this->belongsToMany('Authority\Eloquent\Dev','dev_m2n_group','group_id','dev_id');
    }

}