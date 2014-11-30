<?php namespace Authority\Eloquent;

class Prod extends \Eloquent
{
    protected $table = 'prod';
    protected $guarded = [];

    public static $rules = [
        'id'         => 'required|integer',
        'tree_id'    => 'required|exists:tree,id',
        'dev_id'     => 'required|exists:dev,id',
        'mode_id'    => 'required|integer|min:1|max:4',
        'name'       => "required|unique:prod,name",
        'desc'       => "required|unique:prod,desc",
        'alias'      => "required|unique:prod,alias"
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

    public function prodSale()
    {
        return $this->hasOne('Authority\Eloquent\ProdSale', 'id', 'sale_id');
    }

    public function prodWarranty()
    {
        return $this->hasOne('Authority\Eloquent\ProdWarranty', 'id', 'warranty_id');
    }
}