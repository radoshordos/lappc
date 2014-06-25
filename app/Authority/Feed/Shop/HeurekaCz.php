<?php
namespace Authority\Feed\Shop;

use Authority\Eloquent\ViewProd;

class HeurekaCz extends FeedAbstract
{
    public function __construct()
    {
        $this->view = ViewProd::all();
    }

    public function feedRender()
    {
        $this->out .= $this->startDocument();
        foreach ($this->view as $row) {
            $this->out .= $this->startShopItem();
            $this->out .= $this->tagItemId($row);
            $this->out .= $this->tagProduct($row);
            $this->out .= $this->tagDescription($row);
            $this->out .= $this->tagPriceVat($row);
            $this->out .= $this->tagManufacturer($row);
            $this->out .= $this->tagEan($row);
            $this->out .= $this->endShopItem();
        }
        $this->out .= $this->endDocument();
        return $this->out;
    }
}




/*
SHOP
SHOPITEM
OK = ITEM_ID
PRODUCTNAME
OK = PRODUCT
URL
IMGURL
IMGURL_ALTERNATIVE
VIDEO_URL
PRICE_VAT
ITEM_TYPE
PARAM
CATEGORYTEXT
EAN
ISBN
HEUREKA_CPC
DELIVERY_DATE
DELIVERY
ITEMGROUP_ID
ACCESSORY
*/


