<?php

use Authority\Eloquent\TreeGroup;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\ViewTree;


class Url01Controller extends BaseController
{

    public function show($url01)
    {

        return $url01;

        /*
        return View::make('web.home', [
        ]);
        */
    }

}