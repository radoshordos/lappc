<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;

class AkceHugeController extends \BaseController
{
    public function index()
    {
        $action_record = (Input::has('select_action_record') ? Input::get('select_action_record') : NULL);

        return View::make('adm.product.akcehuge.index', [
            'action_record'        => $action_record,
            'item_action'          => SyncDb::where('purpose', '=', 'action')->where('record_id', '=', $action_record)->orderBy('code_prod')->get(['id', 'code_prod', 'name']),
            'select_action_record' => [''] + SB::option(
                    "SELECT record_sync_import.*,
                            mixture_dev.name
                     FROM record_sync_import
                     LEFT JOIN sync_csv_template ON record_sync_import.template_id = sync_csv_template.id
                     LEFT JOIN mixture_dev ON sync_csv_template.mixture_dev_id = mixture_dev.id
                     WHERE record_sync_import.purpose = 'action'
                     ORDER BY id", ['id' => '->name - [Datum importu: ->created_at] - (Záznamů &#8721; = ->item_counter)'])
        ]);
    }

}