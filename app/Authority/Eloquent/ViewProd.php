<?php

namespace Authority\Eloquent;

class ViewProd extends \Eloquent
{
    protected $table = 'view_prod';

    public $timestamps = false;

    public function scopeDev($query, $int)
    {
        if (!empty($int)) {
            return $query->where('dev_id', '=', $int);
        }
    }

    public function scopeTree($query, $int)
    {
        if (!empty($int)) {
            return $query->where('tree_id', '=', $int);
        }
    }

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }

}