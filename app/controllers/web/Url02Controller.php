<?php


class Url02Controller extends EshopController
{

    public function show($url01, $url02)
    {
        $prod = $this->isProudct($url02);
        return (!is_null($prod)) ? $prod : $this->isTreeWithDev([$url01],$url02);
    }

}