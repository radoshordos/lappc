<?php

use \Authority\Eloquent\SyncDb;
use \Authority\Eloquent\Items;

class SyncSummaryController extends \BaseController
{
    public function index()
    {
        $i = 0;
        $arr = [];
        $sdb = SyncDb::distinct()
            ->select(['sync_db.dev_id', 'dev.name'])
            ->join('dev', 'dev.id', '=', 'sync_db.dev_id')
            ->where('purpose', '=', Input::get('dfilter'))
            ->orderBy('dev_id')
            ->get();

        if (!empty($sdb)) {
            foreach ($sdb as $row) {

                $count_sync_db = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->count();
                $count_sync_db_sync = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->whereNotNull('sync_db.item_id')->count();
                $count_sync_db_nosync = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->whereNull('sync_db.item_id')->count();

                $count_items_hide = Items::join('prod', 'prod.id', '=', 'items.prod_id')
                    ->leftJoin('sync_db', 'items.id', '=', 'sync_db.item_id')
                    ->where('prod.dev_id', '=', $row->dev_id)
                    ->where('prod.mode_id', '>', '1')
                    ->whereNull('sync_db.id')->orWhere('purpose', '!=', Input::get('dfilter'))
                    ->count();

                $count_price_diff = SyncDb::join('items', 'items.id', '=', 'sync_db.item_id')
                    ->join('prod', 'prod.id', '=', 'items.prod_id')
                    ->where('purpose', '=', Input::get('dfilter'))
                    ->where('sync_db.dev_id', '=', $row->dev_id)
                    ->whereNotNull('sync_db.item_id')
                    ->whereRaw('sync_db.price_standard != prod.price')
                    ->count();

                $arr[$i++] = array_merge($row->toArray(),
                    ['count_sync_db' => $count_sync_db],
                    ['count_sync_db_sync' => $count_sync_db_sync],
                    ['count_sync_db_nosync' => $count_sync_db_nosync],
                    ['count_items_hide' => $count_items_hide],
                    ['count_price_diff' => $count_price_diff]
                );
            }
        }

        return View::make('adm.sync.summary.index', [
            'dfilter' => Input::get('dfilter'),
            'summary' => !empty($arr) ? $arr : NULL
        ]);
    }
}