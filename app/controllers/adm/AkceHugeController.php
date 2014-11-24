<?php

use Authority\Eloquent\SyncDb;
use Authority\Tools\SB;

class AkceHugeController extends \BaseController
{
    public function index()
    {
        $action_record = (Input::has('select_action_record') ? Input::get('select_action_record') : NULL);

        return View::make('adm.product.akcehuge.index', [
            'action_record'        => $action_record,
            'item_action'          => SyncDb::where('purpose', '=', 'action')
                ->leftJoin('items', 'sync_db.item_id', '=', 'items.id')
                ->leftJoin('prod', 'items.prod_id', '=', 'prod.id')
                ->where('record_id', '=', $action_record)
                ->whereNotNull('price_action')
                ->orWhereNotNull('price_internet')
                ->whereNotNull('item_id')
                ->orderBy('prod_name')
                ->get([
                    'sync_db.id AS sync_db_id',
                    'sync_db.code_prod AS sync_db_code_prod',
                    'sync_db.price_action AS sync_db_price_action',
                    'sync_db.price_internet AS sync_db_price_internet',
                    'prod.name AS prod_name',
                    'prod.price AS prod_price',
                ]),
            'select_action_record' => [''] + SB::option(
                    "SELECT record_sync_import.*,
                            mixture_dev.name,
                            COUNT(sync_db.record_id) AS rsi_actual_count
                     FROM record_sync_import
                     INNER JOIN sync_db ON sync_db.record_id = record_sync_import.id
                     LEFT JOIN sync_csv_template ON record_sync_import.template_id = sync_csv_template.id
                     LEFT JOIN mixture_dev ON sync_csv_template.mixture_dev_id = mixture_dev.id
                     WHERE record_sync_import.purpose = 'action'
                     GROUP BY record_sync_import.id
                     ORDER BY id", ['id' => '->name - [Datum importu: ->created_at] - (Záznamů &#8721; = ->rsi_actual_count)'])
        ]);
    }

}