<?php

namespace Authority\Feed;

class FeedAbstract
{

    public function tagItemId($row)
    {
        return "  <ITEM_ID>" . $row["prod_id"] . "</ITEM_ID>\n";
    }

    public function tagProduct($row)
    {
        return "  <PRODUCT>" . $row["prod_name"] . "</PRODUCT>\n";
    }

    public function tagProductName($row)
    {
        return "  <PRODUCTNAME>" . $row["prod_name"] . "</PRODUCTNAME>\n";
    }

    public function tagPriceVat($row)
    {
        return "  <PRICE_VAT>" . round($row["query_price"]) . "</PRICE_VAT>\n";
    }

    public function tagManufacturer($row)
    {
        return "  <MANUFACTURER>" . $row["dev_name"] . "</MANUFACTURER>\n";
    }

    public function tagUrl($row)
    {
        return "  <URL>" . implode('/', [\URL::route('home'), $row["tree_absolute"], $row["prod_alias"]]) . "</URL>\n";
    }

} 