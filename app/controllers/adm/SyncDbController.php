<?php

use Authority\Tools\SB;

class SyncDbController extends \BaseController
{
    public function index()
    {

        $dev = \DB::table('mixture_dev_m2n_dev')->where('mixture_dev_id', Input::get('select_mixture_dev'))->lists('dev_id');
        $select_mixture_dev = SB::option("SELECT * FROM mixture_dev ORDER BY name", ['id' => '->name']);

        if (strlen(Input::get('select_connect')) == 0 || count($dev) == 0) {

            return View::make('adm.sync.db.index', [
                'input' => Input::all(),
                'select_mixture_dev' => $select_mixture_dev
            ]);

        } else {

            $db = \DB::table('sync_db');

            switch (Input::get('select_connect')) {

                case 'code_ean':
                    $db->leftJoin('items', "items.code_ean", '=', "sync_db.code_ean");
                    $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                    break;
                case 'name':
                    $db->leftJoin('prod', 'prod.name', '=', 'sync_db.name');
                    $db->leftJoin('items', 'prod.id', '=', 'items.prod_id');
                    break;
                default:
                    $db->leftJoin('items', "items.code_prod", '=', "sync_db.code_prod");
                    $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                    break;
            }

            switch (Input::get('join')) {
                case 'left':
                    $db->whereNotNull('prod.name');
                    break;
                default:
                    break;
            }

            $db->select([
                'sync_db.id AS sync_id',
                'sync_db.code_ean AS sync_code_ean',
                'sync_db.code_prod AS sync_code_prod',
                'sync_db.name AS sync_name',
                'sync_db.desc AS sync_desc',
                'sync_db.price_standard AS sync_price_standard',
                'items.code_ean AS items_code_ean',
                'items.code_prod AS items_code_prod',
                'prod.name AS prod_name'
            ]);

            $db->whereIn('sync_db.dev_id', $dev);

            return View::make('adm.sync.db.index', [
                'db' => $db->paginate(intval(Input::get('limit') > 0) ? Input::get('limit') : 20),
                'input' => Input::all(),
                'select_mixture_dev' => $select_mixture_dev
            ]);
        }
    }
}
