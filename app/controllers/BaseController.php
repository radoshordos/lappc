<?php

use Authority\Eloquent\BuyOrderDbItems;

class BaseController extends Controller
{
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }


    protected function saveHttpRefer()
    {
        if (!empty($_SERVER["REMOTE_ADDR"]) && (!empty($_SERVER["REQUEST_URI"])) && (!empty($_SERVER["HTTP_REFERER"]))) {

            $created_int = strtotime('now');
            $count = \DB::table('record_visitors_hit')->where('created_int', '>', $created_int - 3600)->where('remote_addr', '=', $_SERVER["REMOTE_ADDR"])->count();
            if ($count === 0 && strlen($_SERVER["HTTP_REFERER"]) < 255 && strlen($_SERVER["REQUEST_URI"]) < 255) {

                \DB::table('record_visitors_hit')->insert([
                    'created_int'  => $created_int,
                    'remote_addr'  => $_SERVER["REMOTE_ADDR"],
                    'request_uri'  => $_SERVER["REQUEST_URI"],
                    'http_referer' => $_SERVER["HTTP_REFERER"]
                ]);
            }
        }
    }
}