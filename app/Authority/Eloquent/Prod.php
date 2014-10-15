<?php namespace Authority\Eloquent;

class Prod extends \Eloquent
{
    protected $table = 'prod';
    protected $guarded = [];

    public static $rules = [
        'id' => 'required|integer',
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

    public function akce()
    {
        return $this->hasOne('Authority\Eloquent\Akce', 'prod_id', 'id');
    }

    public function prodDifference()
    {
        return $this->hasOne('Authority\Eloquent\ProdDifference', 'id', 'difference_id');
    }

}