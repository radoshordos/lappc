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
            RecordFind::create([
                'find_at'     => strtotime('now'),
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