<?php

use Authority\Tools\SB;

class SyncCsvImportController extends \BaseController
{

    public function create()
    {
        return View::make('adm.sync.csvimport.create',array(
            'sync_template' => [''] + SB::option("SELECT * FROM sync_csv_template", ['id' => '->id'])
        ));
    }

} 