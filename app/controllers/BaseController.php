<?php

class BaseController extends Controller
{
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
        $this->saveHttpRefer();
    }


    protected function saveHttpRefer()
    {
        if (!empty($_SERVER["HTTP_REFERER"]) && (!empty($_SERVER["REMOTE_ADDR"]))) {

            $count = DB::whereRaw('created_at != DATE_SUB(NOW(),INTERVAL 1 HOUR')->where('remote_addr', '=', trim($_SERVER["REMOTE_ADDR"]))->count();
            if ($count === 0 && strlen($_SERVER["HTTP_REFERER"]) < 255) {

                DB::table('record_visitors_hit')->insert(['http_referer' => trim($_SERVER["HTTP_REFERER"]),
                                                          'request_url'  => trim($_SERVER["REQUEST_URI"]),
                                                          'remote_addr'  => trim($_SERVER["REMOTE_ADDR"])]
                );
            }
        }
    }
}