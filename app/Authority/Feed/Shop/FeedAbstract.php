<?php

namespace Authority\Feed\Shop;

abstract class FeedAbstract implements FeedInferface
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

    public function tagItemId($row)
    {
        return "  <ITEM_ID>" . $row["prod_id"] . "</ITEM_ID>\n";
    }

    public function tagProduct($row)
    {
        return "  <PRODUCT>" . $row["prod_name"] . "</PRODUCT>\n";
    }

    public function tagDescription($row)
    {
        return "  <DESCRIPTION>" . $row["prod_desc"] . "</DESCRIPTION>\n";
    }

    public function tagManufacturer($row)
    {
        return "  <MANUFACTURER>" . $row["dev_name"] . "</MANUFACTURER>\n";
    }

    public function tagPriceVat($row)
    {
        return "  <PRICE_VAT>" . $row["prod_price"] . "</PRICE_VAT>\n";
    }

    public function tagEan($row)
    {
        if (!empty($row["EAN"])) {
            return "  <EAN>" . $row["EAN"] . "</EAN>\n";
        }
    }


}