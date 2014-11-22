<?php

use Authority\Eloquent\RecordSyncImport;

class RecordSyncImportController extends \BaseController
{
    public function index()
    {
        return View::make('adm.sync.record.index', [
            'record' => RecordSyncImport::select(['record_sync_import.*', DB::raw('COUNT(sync_db.record_id) AS rsi_actual_count')])
                ->join('sync_db', 'sync_db.record_id', '=', 'record_sync_import.id')
                ->groupBy('record_sync_import.id')
                ->orderBy('id', ' ASC')
                ->get()
        ]);
    }

}