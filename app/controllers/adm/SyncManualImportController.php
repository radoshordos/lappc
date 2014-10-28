<?php

use Authority\Eloquent\SyncDb;

class SyncManualImportController extends \BaseController
{

    public function index()
    {
        return View::make('adm.sync.manualimport.index', [
            'data' => SyncDb::all()


        ]);
    }

} 