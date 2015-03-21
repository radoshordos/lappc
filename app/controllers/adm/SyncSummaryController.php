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

                $count_insert_prod = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->whereNotNull('sync_db.item_id')->count();
                $count_items_dev = SyncDb::where('purpose', '=', Input::get('dfilter'))->where('dev_id', '=', $row->dev_id)->count();

                $count_price_diff = SyncDb::join('items', 'items.id', '=', 'sync_db.item_id')
                    ->join('prod', 'prod.id', '=', 'items.prod_id')
                    ->where('purpose', '=', Input::get('dfilter'))
                    ->where('sync_db.dev_id', '=', $row->dev_id)
                    ->whereNotNull('sync_db.item_id')
                    ->whereRaw('sync_db.price_standard != prod.price')
                    ->count();

                $count_sync_no = Items::join('prod', 'prod.id', '=', 'items.prod_id')
                    ->leftJoin('sync_db', 'items.id', '=', 'sync_db.item_id')
                    ->where('prod.dev_id', '=', $row->dev_id)
                    ->where('prod.mode_id', '>', '1')
                    ->whereNull('sync_db.id')
                    ->count();

                $arr[$i++] = array_merge($row->toArray(),
                    ['count_insert_prod' => $count_insert_prod],
                    ['count_items_dev' => $count_items_dev],
                    ['count_price_diff' => $count_price_diff],
                    ['count_sync_no' => $count_sync_no]
                );
            }
        }

        return View::make('adm.sync.summary.index', [
            'dfilter' => Input::get('dfilter'),
            'summary' => !empty($arr) ? $arr : NULL
        ]);
    }
}