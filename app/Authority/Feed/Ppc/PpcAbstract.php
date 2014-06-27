<?php

namespace Authority\Feed\Ppc;

use Authority\Feed\FeedAbstract;

abstract class PpcAbstract extends FeedAbstract implements PpcInterface
{
    protected $out = "";
    protected $view;

    public function tagDevId($row)
    {
        return "  <DEV_ID>" . $row["dev_id"] . "</DEV_ID>\n";
    }

    public function tagTreeId($row)
    {
        return "  <TREE_ID>" . $row["tree_id"] . "</TREE_ID>\n";
    }

    public function tagMarket($row)
    {
        if (intval($row["prod_mode_id"]) > 1) {
            return "  <ISMARKET>1</ISMARKET>\n";
        }
    }

    public function tagAction($row)
    {
        if (intval($row["prod_mode_id"]) == 4) {
            return "  <ISACTION>1</ISACTION>\n";
        }
    }

    public function tagSend($row)
    {
        if ((1==1) && intval($row["prod_mode_id"]) > 1) {
            return "  <ISSEND>1</ISSEND>\n";
        }
    }

    public function startDocument()
    {
        return "<PPC>\n";
    }

    public function endDocument()
    {
        return "</PPC>";
    }

    public function startShopItem()
    {
        return " <SHOPITEM>\n";
    }

    public function endShopItem()
    {
        return " </SHOPITEM>\n";
    }
}