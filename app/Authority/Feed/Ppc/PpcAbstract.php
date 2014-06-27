<?php

namespace Authority\Feed\Ppc;

use Authority\Feed\FeedAbstract;

abstract class PpcAbstract extends FeedAbstract implements PpcInterface
{
    protected $out = "";
    protected $view;

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