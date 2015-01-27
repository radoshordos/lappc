<?php namespace Authority\Feed\Affiliate;

use Authority\Feed\ShopAbstract;

class Mobilstav extends ShopAbstract
{

    public function feedRender()
    {
        $this->out .= $this->startDocument();
        foreach ($this->view as $row) {
            $this->out .= $this->startShopItem();
            $this->out .= $this->tagItemId($row);
            $this->out .= $this->tagManufacturer($row);
            $this->out .= $this->tagProduct($row);
            $this->out .= $this->tagDescription($row);
            $this->out .= $this->tagEan($row);
            $this->out .= $this->tagPriceVat($row);
            $this->out .= $this->tagUrl($row);
            $this->out .= $this->tagUrlImg($row);
            $this->out .= $this->endShopItem();
        }
        $this->out .= $this->endDocument();
        return $this->out;
    }
}