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
}