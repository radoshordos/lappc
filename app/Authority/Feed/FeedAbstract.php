<?php namespace Authority\Feed;

class FeedAbstract
{
    public function tagItemId($row)
    {
        return "  <ITEM_ID>" . $row["prod_id"] . "</ITEM_ID>\n";
    }

    public function tagProduct($row)
    {
        return "  <PRODUCT>" . htmlspecialchars($row["prod_name"]) . "</PRODUCT>\n";
    }

    public function tagProductName($row)
    {
        return "  <PRODUCTNAME>" . htmlspecialchars($row["prod_name"]) . "</PRODUCTNAME>\n";
    }

    public function tagPriceVat($row)
    {
        return "  <PRICE_VAT>" . round($row["prod_search_price"]) . "</PRICE_VAT>\n";
    }

    public function tagManufacturer($row)
    {
        return "  <MANUFACTURER>" . $row["dev_name"] . "</MANUFACTURER>\n";
    }

    public function tagUrl($row)
    {
        return "  <URL>" . implode('/', [\URL::route('web.home'), $row["tree_absolute"], $row["prod_alias"]]) . "</URL>\n";
    }

    public function tagImgUrl($row)
    {
        return "  <IMGURL>" . implode('/', [\URL::route('web.home'), "web/naradi", $row["tree_absolute"], $row["prod_img_normal"]]) . "</IMGURL>\n";
    }

    public function tagCategoryText($row)
    {
        return "  <CATEGORYTEXT>" . $row["category_text"] . "</CATEGORYTEXT>\n";
    }

    public function tagDescription($row)
    {
        return "  <DESCRIPTION>" . htmlspecialchars($row["prod_desc"]) . "</DESCRIPTION>\n";
    }
}