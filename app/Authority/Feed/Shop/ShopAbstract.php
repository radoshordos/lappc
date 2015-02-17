<?php namespace Authority\Feed\Shop;

use Authority\Feed\FeedAbstract;
use Authority\Eloquent\ViewProd;

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

    public function tagEan($row)
    {
        if (!empty($row["EAN"])) {
            return "  <EAN>" . $row["EAN"] . "</EAN>\n";
        }
    }

    public function getProd($tree_id)
    {
        return ViewProd::leftJoin('tree', 'tree.id', '=', 'view_prod.tree_id')
            ->where('tree_id', '!=', $tree_id)
            ->where('prod_mode_id', '>', 2)
            ->where('prod_search_price', '!=', '9999999')
            ->get();
    }
}