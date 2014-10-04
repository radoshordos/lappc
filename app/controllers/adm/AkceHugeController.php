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
                    "SELECT sync_record.*,
                            mixture_dev.name
                     FROM sync_record
                     LEFT JOIN sync_csv_template ON sync_record.template_id = sync_csv_template.id
                     LEFT JOIN mixture_dev ON sync_csv_template.mixture_dev_id = mixture_dev.id
                     WHERE sync_record.purpose = 'action'
                     ORDER BY id", ['id' => '->name - [Datum importu: ->created_at] - (Záznamů &#8721; = ->item_counter)'])
        ]);
    }

}