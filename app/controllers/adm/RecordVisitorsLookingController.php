<?php

use Authority\Eloquent\RecordVisitorsLooking;

class RecordVisitorsLookingController extends \BaseController
{
    public function index()
    {
        return View::make('adm.stats.recordvisitors.index', [
            'recordvisitors' => RecordVisitorsLooking::orderBy('id','DESC')->get()
        ]);
    }
} 