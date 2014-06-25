<?php

namespace Authority\Feed\Shop;

interface FeedInferface
{
    public function tagProduct($row);

    public function tagDescription($row);

    public function tagPriceVat($row);
}