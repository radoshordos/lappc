<?php

namespace Authority\Feed\Ppc;

interface PpcInterface
{
    public function tagItemId($row);

    public function tagProduct($row);

    public function tagUrl($row);

    public function tagPriceVat($row);

    public function tagManufacturer($row);

    public function tagSendReady($row);

    public function tagAction($row);

    public function tagActive($row);
}