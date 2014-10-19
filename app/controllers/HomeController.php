<?php

use \Authority\Eloquent\RecordFind;

class HomeController extends BaseController
{

    public function showWelcome()
    {
        if (Input::has('term')) {
            $dt = new DateTime;
            RecordFind::create([
                'find_at'     => $dt->format('Y-m-d H:i:s'),
                'filter_find' => Input::get('term'),
                'count_dev'   => 0,
                'count_prod'  => 0
            ]);
        }

        return View::make('web.home', [
            'term' => Input::get('term')
        ]);
    }

}