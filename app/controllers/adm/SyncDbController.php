<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;

class SyncDbController extends \BaseController
{
    public function index()
    {
        $dev = \DB::table('mixture_dev_m2n_dev')->where('mixture_dev_id', Input::get('select_mixture_dev'))->lists('dev_id');
        $select_mixture_dev = SB::option("SELECT * FROM mixture_dev WHERE purpose = 'autosimple' OR purpose = 'devgroup' ORDER BY name", ['id' => '->name'], TRUE);

        if (count($dev) > 0) {
            $select_categorytext = SB::optionEloqent(SyncDb::select('categorytext')->whereIn('purpose', ['manualsync', 'autosync'])->whereIn('sync_db.dev_id', $dev)->distinct()->get(), ['categorytext' => '->categorytext'], TRUE);
        }

        if (strlen(Input::get('select_connect')) == 0 || (count($dev) == 0 && Input::has('record') === FALSE))   {

            return View::make('adm.sync.db.index', [
                'input'               => Input::all(),
                'select_mixture_dev'  => $select_mixture_dev,
                'select_categorytext' => (isset($select_categorytext) ? $select_categorytext : [])
            ]);

        } else {

            $db = \DB::table('sync_db');
            if (Input::has('record') === FALSE && intval(Input::get('select_mixture_dev')) > 0) {
                $db->whereIn('sync_db.dev_id', $dev);
            }

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
                case 'noleft':
                    $db->whereNull('prod.name');
                    break;
                default:
                    break;
            }

            if (Input::has('categorytext')) {
                $db->where('categorytext', '=', Input::get('categorytext'));
            }

            if (Input::has('record')) {
                $db->where('record_id', '=', Input::get('record'));
            }

            switch (Input::get('money')) {
                case 'same':
                    $db->whereRaw('sync_db.price_standard = prod.price')->whereNotNull('prod.price');
                    break;
                case 'diverse':
                    $db->whereRaw('sync_db.price_standard != prod.price')->whereNotNull('prod.price');
                    break;
                default:
                    break;
            }

            switch (Input::get('accessory')) {
                case '1':
                    $db->where('count_accessory', '>', '0');
                    break;
                case '2':
                    $db->where('count_accessory', '=', '0');
                    break;
                default:
                    break;
            }

            switch (Input::get('file')) {
                case '1':
                    $db->where('count_file', '>', '0');
                    break;
                case '2':
                    $db->where('count_file', '=', '0');
                    break;
                default:
                    break;
            }

            switch (Input::get('img')) {
                case '1':
                    $db->where('count_img', '>', '0');
                    break;
                case '2':
                    $db->where('count_img', '=', '0');
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
                'prod.id AS prod_id',
                'prod.price AS prod_price',
                'prod.name AS prod_name',
                'prod.desc AS prod_desc',
                'prod.tree_id AS prod_tree_id'
            ]);

            return View::make('adm.sync.db.index', [
                'db'                  => $db->paginate(intval(Input::get('limit') > 0) ? Input::get('limit') : 20),
                'input'               => Input::all(),
                'select_mixture_dev'  => $select_mixture_dev,
                'select_categorytext' => (isset($select_categorytext) ? $select_categorytext : [])
            ]);
        }
    }
}
