<?php


class Url02Controller extends EshopController
{

    public function show($url01, $url02)
    {
        $prod = $this->isProudct($url02);
        return (!is_null($prod)) ? $prod : $this->isTree([$url01],$url02);
    }

}