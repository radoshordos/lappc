<?php

namespace Authority\Feed\Shop;

use Authority\Eloquent\ViewProd;

class HyperzboziCz extends FeedAbstract
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
            $this->out .= $this->tagDescription($row);
            $this->out .= $this->tagPriceVat($row);
            $this->out .= $this->endShopItem();
        }
        $this->out .= $this->endDocument();
        return $this->out;
    }

}

/*
PRODUCT	- stručný název zadávaného výrobku – povinný údaj

URL	-www adresa odkazující přímo na stránku s nabídkou daného produktu - povinný údaj
IMGURL	-www adresa odkazující přímo na obrázek produktu - povinný údaj
DUES	-poplatky které je nutné zaplatit při koupi zboží (autorské a recyklační poplatky, nikoliv však doprava a balné) – nepovinný údaj v případě, pokud jsou tyto poplatky již obsaženy v ceně výrobku - PRICE resp. PRICE_VAT
EAN	-čárový kód, prostředek pro automatizovaný sběr dat - nepovinný údaj
ISBN	-alfanumerický kód určený pro jednoznačnou identifikaci knižních vydání - nepovinný údaj
CATEGORYTEXT	-textový popis kategorie, do které ve svém obchodu produkt zařazujete, uvádějte celou cestu k cílové kategorii - povinný údaj



