<?php


class Url02Controller extends EshopController
{

    public function show($url01, $url02)
    {
        return $url01 . "<br />" . $url02;
    }

}