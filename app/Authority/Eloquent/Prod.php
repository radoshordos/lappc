<?php namespace Authority\Eloquent;

class Prod extends \Eloquent
{
    protected $table = 'prod';
    protected $guarded = [];

    public static $rules = [
        'id'         => 'required|integer',
        'tree_id'    => 'required|exists:tree,id',
        'dev_id'     => 'required|exists:dev,id',
        'name'       => "required|unique:prod,name",
        'alias'      => "required|unique:prod,alias",
    ];

    public static $rules_picture = [
        'img_big'    => 'required',
        'img_normal' => 'required',
    ];

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

    public function forex()
    {
        return $this->hasOne('Authority\Eloquent\Forex', 'id', 'forex_id');
    }

    public function tree()
    {
        return $this->hasOne('Authority\Eloquent\Tree', 'id', 'tree_id');
    }

    public function dev()
    {
        return $this->hasOne('Authority\Eloquent\Dev', 'id', 'dev_id');
    }

    public function akce()
    {
        return $this->hasOne('Authority\Eloquent\Akce', 'akce_prod_id', 'id');
    }

    public function prodDifference()
    {
        return $this->hasOne('Authority\Eloquent\ProdDifference', 'id', 'difference_id');
    }

}