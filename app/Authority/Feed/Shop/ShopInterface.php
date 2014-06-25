<?php

namespace Authority\Feed\Shop;

interface ShopInterface
{

    public function tagProduct($row);

    public function tagDescription($row);

    public function tagUrl($row);

    public function tagPriceVat($row);
}