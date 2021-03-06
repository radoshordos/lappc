<?php namespace Authority\Eloquent;

class Tree extends \Eloquent
{
    protected $table = 'tree';
    protected $guarded = [];

    public static $rules = [
        'id'        => 'required|integer',
        'parent_id' => 'required|integer',
        'position'  => 'required|integer',
        'name'      => 'required|min:2|max:40',
        'desc'      => 'required|min:5|max:80',
        'relative'  => 'required|min:2|max:64',
    ];

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

    public function scopeLimit($query, $int, $default_number = 30)
    {
        if (intval($int) > 0) {
            return $query->take($int);
        } else {
            return $query->take($default_number);
        }
    }

    public function treeDev()
    {
        return $this->hasMany('Authority\Eloquent\TreeDev', 'tree_id', 'id');
    }

}