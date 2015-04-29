<?php

class Url03Controller extends EshopController
{
    public function __destruct()
    {
        $this->saveHttpRefer();
    }

    public function show($url01, $url02, $url03)
    {
        $prod = $this->isProudct($url03);
        return (!is_null($prod)) ? $prod : $this->isTree([$url01, $url02], $url03);
    }
}