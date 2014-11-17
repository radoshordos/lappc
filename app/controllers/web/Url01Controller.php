<?php

use Authority\Eloquent\TreeGroup;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;


class Url01Controller extends EshopController
{

    public function show($url01)
    {


        return $this->isTree([$url01]);
    }

}