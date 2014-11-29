<?php

use Authority\Eloquent\Akce;
use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\Prod;
use Authority\Eloquent\RecordSyncImport;
use Authority\Eloquent\SyncDb;
use Authority\Tools\SB;

class AkceHugeController extends \BaseController
{
    public function index()
    {
        $action_record = (Input::has('select_action_record') ? Input::get('select_action_record') : NULL);

        $item_action = SyncDb::select(
            [
                'sync_db.id AS sync_db_id',
                'sync_db.item_id AS sync_db_item_id',
                'sync_db.code_prod AS sync_db_code_prod',
                'sync_db.price_action AS sync_db_price_action',
                'sync_db.price_internet AS sync_db_price_internet',
                'prod.id AS prod_id',
                'prod.mode_id AS prod_mode_id',
                'prod.tree_id AS prod_tree_id',
                'prod.ic_all AS prod_ic_all',
                'prod.name AS prod_name',
                'prod.price AS prod_price'
            ])
            ->leftJoin('items', 'sync_db.item_id', '=', 'items.id')
            ->leftJoin('prod', 'items.prod_id', '=', 'prod.id')
            ->whereRaw('purpose = "action"')
            ->where('record_id', '=', $action_record)
            ->orderBy('prod_name');

        switch (Input::get('dfilter')) {
            case 'mode2' :
                $item_action->whereNull('sync_db.item_id');
                break;
            case 'mode3' :
                $item_action->whereNotNull('sync_db.item_id')->whereRaw('prod.mode_id = 3')->whereNotNull('prod.id');
                break;
            case 'mode4' :
                $item_action->whereNotNull('sync_db.item_id')->whereRaw('prod.mode_id = 4')->whereNotNull('prod.id');
                break;
        }

        $mixture_dev = RecordSyncImport::select(['mixture_dev_id'])
            ->join('sync_csv_template', 'record_sync_import.template_id', '=', 'sync_csv_template.id')
            ->where('record_sync_import.id', '=', Input::get('select_action_record'))
            ->pluck('mixture_dev_id');

        $template = NULL;
        if ($mixture_dev > 0) {
            $template = SB::optionEloqent(AkceTempl::select(
                [
                    DB::raw('(SELECT COUNT(akce.akce_id) FROM akce WHERE akce.akce_template_id = akce_template.id) AS akce_count'),
                    'akce_template.id AS akce_template_id',
                    'akce_template.bonus_title AS akce_template_bonus_title',
                    'akce_availability.name AS akce_availability_name',
                    'akce_minitext.name AS akce_minitext_name',
                    'mixture_dev.name AS mixture_dev_name'
                ])
                ->join('mixture_dev', 'akce_template.mixture_dev_id', '=', 'mixture_dev.id')
                ->join('akce_availability', 'akce_template.availibility_id', '=', 'akce_availability.id')
                ->join('akce_minitext', 'akce_template.minitext_id', '=', 'akce_minitext.id')
                ->where('akce_template.id', '>', '1')
                ->where('akce_template.mixture_dev_id', '=', $mixture_dev)
                ->get(), ['akce_template_id' => '[->mixture_dev_name] - [&#8721;=->akce_count] - [->akce_minitext_name] - [->akce_availability_name] - ->akce_template_bonus_title'], true);
        }

        return View::make('adm.product.akcehuge.index', [
            'action_record'        => $action_record,
            'dfilter'              => Input::get('dfilter'),
            'choice_action_record' => Input::get('select_action_record'),
            'item_action'          => $item_action->get(),
            'mixture_dev'          => $mixture_dev,
            'select_template'      => $template,
            'choice_template'      => Input::get('select_template'),
            'select_sale'          => SB::option("SELECT * FROM prod_sale WHERE visible = 1", ['id' => '->desc']),
            'choice_sale'          => Input::get('select_sale'),
            'select_action_record' => SB::option(
                    "SELECT record_sync_import.*,
                            mixture_dev.name,
                            COUNT(sync_db.record_id) AS rsi_actual_count
                     FROM record_sync_import
                     INNER JOIN sync_db ON sync_db.record_id = record_sync_import.id
                     LEFT JOIN sync_csv_template ON record_sync_import.template_id = sync_csv_template.id
                     LEFT JOIN mixture_dev ON sync_csv_template.mixture_dev_id = mixture_dev.id
                     WHERE record_sync_import.purpose = 'action'
                     GROUP BY record_sync_import.id
                     ORDER BY id", ['id' => '->name - [Datum importu: ->created_at] - (Záznamů &#8721; = ->rsi_actual_count)'], true)
        ]);
    }


    public function store()
    {
        $count = 0;
        if (Input::has('add-huge-action') && count(Input::get('select')) > 0 && Input::get('select_template') > 0) {
            try {
                foreach (Input::get('select') as $key => $val) {
                    if ($val == 'on') {
                        $count++;
                        \DB::transaction(function () use ($key) {
                            $prod = Prod::find($key);
                            $prod->mode_id = 4;
                            $prod->save();

                            $akce = Akce::where('akce_prod_id', '=', $key)->first();
                            $akce->akce_template_id = Input::get('select_template');
                            $akce->akce_sale_id = Input::get('select_sale');
                            $akce->akce_updated_at = DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now'));
                            $akce->setKeyName('akce_prod_id');
                            $akce->save();
                        });
                    }
                }
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
                return Redirect::route('adm.product.akcehuge.index');
            }
            Session::flash('success', "Proběhl hromadný import, vloženo <b>" . $count . "</b> akcí");
        }

        elseif (Input::has('delete-huge-action')) {
            try {
                foreach (Input::get('select') as $key => $val) {
                    if ($val == 'on') {
                        $count++;
                        $prod = Prod::find($key);
                        $prod->mode_id = 3;
                        $prod->save();
                    }
                }
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
                return Redirect::route('adm.product.akcehuge.index');
            }
            Session::flash('warning', "Proběhlo zrušení akcí u <b>" . $count . "</b> produktů");
        }

        return Redirect::route('adm.product.akcehuge.index', ['select_action_record' => Input::get('select_action_record'), 'dfilter' => Input::get('dfilter')]);
    }
}