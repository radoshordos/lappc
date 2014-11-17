<?php

class Url03Controller extends EshopController
{

    public function show($url01, $url02, $url03)
    {
        echo $this->isProudct($url03);
        echo "<br />";
        echo "<br />";
        echo $this->isTree([$url01,$url02]);
        echo "<br />";
        echo "<br />";
        return "<br />" . $url01 . "<br />" . $url02 . "<br />" . $url03;
    }

}