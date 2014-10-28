<?php

use Authority\Eloquent\SyncDb;
use Authority\Tools\SB;

class SyncManualImportController extends \BaseController
{

    public function index()
    {
        Input::has('select_limit') ? $input_limit = intval(Input::get('select_limit')) : $input_limit = 20;

        $db = new SyncDb();

        return View::make('adm.sync.manualimport.index', [
            'data' => $db->paginate($input_limit),
            'choice_limit' => $input_limit,
            'select_dev' => SB::option('SELECT DISTINCT dev_id,dev.name FROM sync_db as sd INNER JOIN dev ON sd.dev_id = dev.id ORDER BY name',['dev_id' => '->name'])
        ]);
    }

} 