<?php


class Url02Controller extends EshopController
{

    public function show($url01, $url02)
    {
        return $this->isTreeWithDev([$url01], $url02);
    }

}