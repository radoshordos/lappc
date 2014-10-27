<?php

use Authority\Eloquent\RecordVisitorsLooking;
use Carbon\Carbon;

class HomeController extends BaseController
{

    public function showWelcome()
    {
        if (Input::has('term')) {
            $counter = RecordVisitorsLooking::where('find_at', '>', new Carbon('last hour'))->where('filter_find', '=', Input::get('term'))->orderBy('id')->count();
            if ($counter == 0) {
                $dt = new DateTime;
                RecordVisitorsLooking::create([
                    'find_at'     => $dt->format('Y-m-d H:i:s'),
                    'filter_find' => Input::get('term'),
                    'count_dev'   => 0,
                    'count_prod'  => 0
                ]);
            }
        }

        return View::make('web.home', [
            'term' => Input::get('term')
        ]);
    }

}