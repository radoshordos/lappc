<?php

class Url03Controller extends EshopController
{

    public function show($url01, $url02, $url03)
    {
        return $this->isTreeWithDev([$url01, $url02], $url03);
    }

}