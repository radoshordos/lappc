<?php

use \Authority\Eloquent\SyncDb;

class SyncDbController extends \BaseController
{
    public function index()
    {
        return View::make('adm.sync.db.index', array(
            'db' => SyncDb::orderBy('id')->get()
        ));
    }
}