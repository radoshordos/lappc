<?php

namespace Authority\Eloquent;

use Authority\Xml\FeedShopitem;

class PpcDb extends \Eloquent
{
    protected $table = 'ppc_db';

    public static function saveShopItem(FeedShopitem $fs) {

        $ppc_db = new PpcDb;
        $ppc_db->name = $fs->getProduct();
        $ppc_db->price = $fs->getPriceVat();
        $ppc_db->save();
    }
}