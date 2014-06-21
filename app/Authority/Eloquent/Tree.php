<?php

namespace Authority\Eloquent;

class Tree extends \Eloquent
{
    protected $table = 'tree';
    protected $guarded = [];

    public static $rules = array(
        'id' => 'required|integer',
        'parent_id' => 'required|integer',
        'position' => 'required|integer',
        'name' => 'required|min:5|max:40',
        'desc' => 'required|min:5|max:80',
        'relative' => 'required|min:5|max:64',
    );

    public function scopeDeep($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where('deep', '=', $int);
        }
    }

    public function scopeGroupId($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where('group_id', '=', $int);
        }
    }

    public function scopeLimit($query, $int)
    {
        if (intval($int) > 0) {
            return $query->take($int);
        } else {
            return $query->take(30);
        }
    }
}