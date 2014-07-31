<?php

use \Authority\Eloquent\SyncRecord;

class SyncRecordController extends \BaseController
{
    public function index()
    {
        return View::make('adm.sync.record.index', array(
            'record' => SyncRecord::orderBy('id')->get()
        ));
    }

}