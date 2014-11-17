<?php


class Url02Controller extends EshopController
{

    public function show($url01, $url02)
    {
        return $this->isTree([$url01, $url02]);
    }

}