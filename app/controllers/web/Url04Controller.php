<?php

use Authority\Web\Prod\Produkt;

class Url04Controller extends EshopController
{
    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    public function show($url01, $url02, $url03, $url04)
    {
        $prod = new Produkt($this->sid, $this->term, $url04);
        $product = $prod->makeProdukt();
        return (!is_null($product)) ? $product : $this->isTree([$url01, $url02, $url03], $url04);
    }
}