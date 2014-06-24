<?php

namespace Authority\Feed\Shop;

interface FeedInferface
{
    public function tagProduct();

    public function tagDescription();

    public function tagPriceVat();
}