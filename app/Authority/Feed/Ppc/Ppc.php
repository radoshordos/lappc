<?php
namespace Authority\Feed\Ppc;

use Authority\Eloquent\ViewProd;

class Ppc extends PpcAbstract
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
            $this->out .= $this->tagPriceVat($row);
            $this->out .= $this->tagUrl($row);
            $this->out .= $this->tagManufacturer($row);
            $this->out .= $this->tagMarket($row);
            $this->out .= $this->tagAction($row);
            $this->out .= $this->tagSend($row);
            $this->out .= $this->endShopItem();
        }
        $this->out .= $this->endDocument();
        return $this->out;
    }

    public function tagMarket($row)
    {
        return "  <ISMARKET>1</ISMARKET>\n";
    }

    public function tagAction($row)
    {
        return "  <ISACTION>1</ISACTION>\n";
    }

    public function tagSend($row)
    {
        return "  <ISSEND>1</ISSEND>\n";
    }
}