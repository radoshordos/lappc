<?php

use Authority\Web\Prod\Produkt;

class Url03Controller extends EshopController
{
    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    public function show($url01, $url02, $url03)
    {
        $prod = new Produkt($this->sid, $this->term, $url03);
        $product = $prod->makeProdukt();
        return (!is_null($product)) ? $product : $this->isTree([$url01, $url02], $url03);
    }
}