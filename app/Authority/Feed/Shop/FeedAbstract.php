<?php

namespace Authority\Feed\Shop;

abstract class FeedAbstract implements FeedInferface
{
    public function tagItemId()
    {
        return '  <ITEM_ID>' . $data['prod_id'] . '</ITEM_ID>\n';
    }

    public function tagProduct()
    {
        return '  <PRODUCT>' . $data['prod_name'] . '</PRODUCT>\n';
    }

    public function tagDescription()
    {
        return '  <DESCRIPTION>' . $data['prod_desc'] . '</DESCRIPTION>\n';
    }

    public function tagPriceVat()
    {
        return '  <PRICE_VAT>' . $data['prod_price'] . '</PRICE_VAT>\n';
    }

}