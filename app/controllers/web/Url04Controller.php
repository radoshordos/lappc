<?php

class Url04Controller extends EshopController
{

    public function show($url01, $url02, $url03, $url04)
    {
        $prod = $this->isProudct($url04);
        return (!is_null($prod)) ? $prod : $this->isTreeWithDev([$url01,$url02,$url03],$url04);
    }

}