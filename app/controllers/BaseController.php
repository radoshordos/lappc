<?php

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
        if (!empty($_SERVER["HTTP_USER_AGENT"]) && (!empty($_SERVER["REMOTE_ADDR"]))) {

            $created_int = strtotime('now');
            $count = \DB::table('record_visitors_hit')->where('created_int', '>', $created_int - 3600)->where('remote_addr', '=', $_SERVER["REMOTE_ADDR"])->count();
            if ($count === 0 && strlen($_SERVER["HTTP_USER_AGENT"]) < 255) {

                \DB::table('record_visitors_hit')->insert([
                    'created_int' => $created_int,
                    'request_url' => $_SERVER["REQUEST_URI"],
                    'remote_addr' => $_SERVER["REMOTE_ADDR"],
                    'user_agent'  => $_SERVER["HTTP_USER_AGENT"]
                ]);
            }
        }
    }
}