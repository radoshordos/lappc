<?php


class Url02Controller extends BaseController
{

    public function show($url01, $url02)
    {

        return $url01 . "<br />" . $url02;


        /*
        return View::make('web.home', [
        ]);
        */
    }

}