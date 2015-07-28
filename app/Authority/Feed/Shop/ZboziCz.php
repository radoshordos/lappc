<?php namespace Authority\Feed\Shop;

use Authority\Eloquent\ViewTree;

class ZboziCz extends ShopAbstract
{
    public function feedRender($filename)
    {
        $this->out .= $this->startDocument();
        $vt = ViewTree::select('tree_id')->where('tree_dir_visible', '>', '0')->get();
        foreach ($vt as $res) {
            foreach ($this->getProd($res->tree_id) as $row) {
                $this->out .= $this->startShopItem();
                $this->out .= $this->tagProductName($row);
                $this->out .= $this->tagDescription($row);
                $this->out .= $this->tagUrl($row);
                $this->out .= $this->tagPriceVat($row);
                $this->out .= $this->tagItemId($row);
                $this->out .= $this->tagImgUrl($row);
                $this->out .= $this->tagEan($row);
                $this->out .= $this->tagProductNo($row);
                $this->out .= $this->tagItemGroupId($row);
                $this->out .= $this->tagManufacturer($row);
                $this->out .= $this->tagCategoryId($row);


                //    $this->out .= $this->tagDeliveryDate($row);
                /// TO WORK
                $this->out .= $this->tagCategoryText($row);
                $this->out .= $this->endShopItem();
            }
        }
        $this->out .= $this->endDocument();
    }


    public function startDocument()
    {
        return '<SHOP xmlns="http://www.zbozi.cz/ns/offer/1.0">' . "\n";
    }

    public function tagProductNo($row)
    {
        if (strpos($row["prod_search_codes"], '|') == FALSE) {
            return "  <PRODUCTNO>" . $row["prod_search_codes"] . "</PRODUCTNO>\n";
        }
    }

    public function tagCategoryId($row)
    {
        if (!empty($row["zbozicz_id"])) {
            return "  <ITEMGROUP_ID>" . $row["zbozicz_id"] . "</ITEMGROUP_ID>\n";
        }
    }

    public function tagItemGroupId($row)
    {
        if ($row["prod_difference_id"] > 1) {
            return "  <ITEMGROUP_ID>" . $row["prod_id"] . "</ITEMGROUP_ID>\n";
        }
    }


    public function tagDeliveryDate($row)
    {
        var_dump($row);
        die;

        // return '<SHOP xmlns="http://www.zbozi.cz/ns/offer/1.0">' . "\n";
    }

}