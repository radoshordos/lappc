<?php

namespace Authority\Eloquent;

class DevM2nGroup extends \Eloquent
{
    protected $table = 'dev_m2n_group';
    protected $guarded = [];
    public $timestamps = false;
    public static $rules = array();

    public function dev()
    {
        return $this->hasMany('Authority\Eloquent\Dev', 'id', 'dev_id');
    }

}