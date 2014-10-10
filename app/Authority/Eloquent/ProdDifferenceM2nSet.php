<?php

namespace Authority\Eloquent;

class ProdDifferenceM2nSet extends \Eloquent
{
    protected $table = 'prod_difference_n2m_set';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'difference_id' => 'required|exists:prod_difference,id',
        'set_id' => 'required|exists:prod_difference_set,id',
    ];

    public function prodDifferenceSet()
    {
        return $this->hasOne('Authority\Eloquent\ProdDifferenceSet', 'id', 'set_id');
    }

    public function prodDifference()
    {
        return $this->hasOne('Authority\Eloquent\ProdDifference', 'id', 'difference_id');
    }

}