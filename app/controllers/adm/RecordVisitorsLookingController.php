<?php

use Authority\Eloquent\RecordVisitorsLooking;

class RecordVisitorsLookingController extends \BaseController
{
    public function index()
    {
        $w1 = RecordVisitorsLooking::orderBy('id', 'DESC');
        $w2 = RecordVisitorsLooking::select(DB::raw('filter_find,count_prod,count_dev,COUNT(record_visitors_looking.id) AS pocet'))->groupBy('filter_find')->orderBy('pocet', 'DESC');
        $w3 = RecordVisitorsLooking::select(DB::raw('filter_find,count_prod,count_dev,COUNT(record_visitors_looking.id) AS pocet'))->where('count_prod', '=', 0)->groupBy('filter_find')->orderBy('pocet', 'DESC');

        if (Input::has('filter_find')) {
            $w1->where('filter_find', 'LIKE', "%" . Input::get('filter_find') . "%");
            $w2->where('filter_find', 'LIKE', "%" . Input::get('filter_find') . "%");
            $w3->where('filter_find', 'LIKE', "%" . Input::get('filter_find') . "%");
        }

        if (Input::has('limit')) {
            $w1->limit(Input::get('limit'));
            $w2->limit(Input::get('limit'));
            $w3->limit(Input::get('limit'));
        }

        return View::make('adm.stats.recordvisitors.index', [
            'window1' => $w1->get(),
            'window2' => $w2->get(),
            'window3' => $w3->get(),
        ]);
    }
}