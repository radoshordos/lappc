<?php

use \Authority\Eloquent\RecordFind;

class HomeController extends BaseController
{

    public function showWelcome()
    {
        {
            {
                var_dump(Input::all());
            }
        }

        if (Input::has('prodsearch')) {
            $dt = new DateTime;
            RecordFind::create([
                'find_at'     => $dt->format('Y-m-d H:i:s'),
                'filter_find' => Input::get('prodsearch'),
                'count_dev'   => 0,
                'count_prod'  => 0
            ]);
        }

        return View::make('web.home', [
            'prodsearch' => Input::get('prodsearch')
        ]);
    }

}