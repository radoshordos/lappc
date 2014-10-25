<?php

class RecordSyncImportController extends \BaseController
{
    public function index()
    {
        return View::make('adm.sync.record.index', [
            'record' => DB::table('record_sync_import AS rsi')
                ->select(['rsi.*',
                    DB::raw('COUNT(sd.record_id) AS rsi_actual_count')
                ])
                ->leftJoin('sync_db AS sd', 'sd.record_id', '=', 'rsi.id')
                ->groupBy('rsi.id')
                ->orderBy('id', ' ASC')
                ->get()
        ]);
    }

}