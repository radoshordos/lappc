<?php

namespace Authority\Eloquent;

use Authority\Feed\ShopItem;

class PpcDb extends \Eloquent
{
    protected $table = 'ppc_db';

    public function scopeProductName($query, $string)
    {
        return $query->where('name', 'LIKE', "%$string%");
    }

    public static function saveShopItem(ShopItem $fs) {

        $ppc_db = new PpcDb;
        $ppc_db->name = $fs->getProduct();
        $ppc_db->price = $fs->getPriceVat();
        $ppc_db->save();
    }

}