<?php

namespace Authority\Feed\Shop;

use Authority\Eloquent\ViewProd;

class ZboziCz extends ShopAbstract {

    public function __construct()
    {
        $this->view = ViewProd::all();
    }

    public function feedRender()
    {
        $this->out .= $this->startDocument();
        foreach ($this->view as $row) {
            $this->out .= $this->startShopItem();
            $this->out .= $this->tagProduct($row);
            $this->out .= $this->tagDescription($row);
            $this->out .= $this->tagPriceVat($row);
            $this->out .= $this->tagManufacturer($row);
            $this->out .= $this->tagUrl($row);
            $this->out .= $this->tagUrlImg($row);
            $this->out .= $this->endShopItem();
        }
        $this->out .= $this->endDocument();
        return $this->out;
    }

}

/*
PRODUCT
PRODUCTNAME
URL
IMGURL
PRICE_VAT
MAX_CPC
DUES
DELIVERY_DATE
SHOP_DEPOTS
ITEM_TYPE
EXTRA_MESSAGE
CATEGORYTEXT
EAN
PRODUCTNO
VARIANT
PRODUCTNAMEEXT
*/