<?php

namespace Authority\Feed\Shop;

use Authority\Feed\FeedAbstract;

abstract class ShopAbstract extends FeedAbstract implements ShopInterface
{
    protected $out = "";
    protected $view;

    public function startDocument()
    {
        return "<SHOP>\n";
    }

    public function endDocument()
    {
        return "</SHOP>";
    }

    public function startShopItem()
    {
        return " <SHOPITEM>\n";
    }

    public function endShopItem()
    {
        return " </SHOPITEM>\n";
    }

    public function tagDescription($row)
    {
        return "  <DESCRIPTION>" . $row["prod_desc"] . "</DESCRIPTION>\n";
    }

    public function tagEan($row)
    {
        if (!empty($row["EAN"])) {
            return "  <EAN>" . $row["EAN"] . "</EAN>\n";
        }
    }

}