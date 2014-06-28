<?php

namespace Authority\Eloquent;

use Authority\Feed\ShopItem;

class PpcDb extends \Eloquent
{
    protected $table = 'ppc_db';

    public static $rules = array(
        'item_id' => "required|unique:ppc_db,item_id",
    );

    public function scopeProductName($query, $string)
    {
        return $query->where('name', 'LIKE', "%$string%");
    }

    public function scopeProductNameLenghtMin($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where(\DB::raw("LENGTH(name)"), '>=', $int);
        }
    }

    public function scopeProductNameLenghtMax($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where(\DB::raw("LENGTH(name)"), '<=', $int);
        }
    }

    public function scopePriceIsMin($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where('price', '>=', $int);
        }
    }

    public function scopePriceIsMax($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where('price', '<=', $int);
        }
    }

}