<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;
use Authority\Eloquent\Prod;

class SyncDbController extends \BaseController
{
    public function index()
    {
        $input = Input::all();
        $dev = \DB::table('mixture_dev_m2n_dev')->where('mixture_dev_id', '=', Input::get('select_mixture_dev'))->lists('dev_id');

        $clear = [
            'select_mixture_dev'        => SB::option("SELECT * FROM mixture_dev WHERE purpose = 'autosimple' OR purpose = 'devgroup' ORDER BY name", ['id' => '->name'], TRUE),
            'choice_mixture_dev'        => (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL),
            'select_categorytext'       => (count($dev) > 0) ? SB::optionEloqent(SyncDb::select('categorytext')->whereIn('purpose', ['manualsync', 'autosync'])->whereIn('sync_db.dev_id', $dev)->distinct()->orderBy('categorytext')->get(), ['categorytext' => '->categorytext'], TRUE) : [],
            'choice_categorytext'       => (isset($input['select_categorytext']) ? $input['select_categorytext'] : NULL),
            'select_basic'              => ['syncdb' => 'SyncDb', 'items' => 'ItemDb'],
            'choice_basic'              => (isset($input['select_basic']) ? $input['select_basic'] : NULL),
            'select_connect'            => ['' => '', 'connect' => 'Existujícího spojení', 'code_prod' => 'Kódu produktu', 'code_ean' => 'EAN produktu', 'name' => 'Názvu produktu'],
            'choice_connect'            => (isset($input['select_connect']) ? $input['select_connect'] : NULL),
            'select_join'               => ['left' => 'Spárované', 'noleft' => 'Nespárované', 'a-n' => 'A/N'],
            'choice_join'               => (isset($input['select_join']) ? $input['select_join'] : NULL),
            'select_prodmode'           => ['' => '', "1" => "Neskryté zboží", "2" => "Jen skryté zboží", "3" => "Vše"],
            'choice_prodmode'           => (isset($input['select_prodmode']) ? $input['select_prodmode'] : NULL),
            'select_availability_count' => ['' => '', '1' => 'ANO', '2' => 'NE', '3' => 'Neznámo'],
            'choice_availability_count' => (isset($input['select_availability_count']) ? $input['select_availability_count'] : NULL),
            'select_money'              => ['' => '', 'diverse' => 'Rozdílná', 'same' => 'Stejná'],
            'choice_money'              => (isset($input['select_money']) ? $input['select_money'] : NULL),
            'select_limit'              => ['20' => 'Limit 20', '100' => 'Limit 100', '250' => 'Limit 250'],
            'choice_limit'              => (isset($input['select_limit']) ? $input['select_limit'] : 20),
            'choice_accessory'          => (isset($input['choice_accessory']) ? $input['choice_accessory'] : NULL),
            'choice_media'              => (isset($input['choice_media']) ? $input['choice_media'] : NULL),
            'choice_img'                => (isset($input['choice_img']) ? $input['choice_img'] : NULL),
            'choice_mixture_dev'        => (isset($input['select_mixture_dev']) ? $input['select_mixture_dev'] : NULL),
            'record'                    => (isset($input['record']) ? $input['record'] : NULL),
        ];

        if ($clear['choice_connect'] == NULL || (count($dev) == 0 && $clear['record'] > 0)) {
            return View::make('adm.sync.db.index', $clear);
        } else {

            if ($clear['choice_basic'] == 'items') {
                $db = \DB::table('items');

                switch ($clear['choice_connect']) {
                    case 'code_ean':
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        $db->leftJoin('sync_db', "items.code_ean", '=', "sync_db.code_ean");
                        break;
                    case 'name':
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        $db->leftJoin('sync_db', 'prod.name', '=', 'sync_db.name');
                        break;
                    case 'connect':
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        $db->leftJoin('sync_db', "items.id", '=', "sync_db.item_id");
                        break;
                    case 'code_prod':
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        $db->leftJoin('sync_db', "items.code_prod", '=', "sync_db.code_prod");
                        break;
                }

                switch ($clear['choice_join']) {
                    case 'left':
                        $db->whereNotNull('sync_db.id');
                        break;
                    case 'noleft':
                        $db->whereNull('sync_db.id');
                        break;
                    default:
                        break;
                }

                if (count($dev) > 0) {
                    $db->whereIn('prod.dev_id', $dev);
                } else {
                    $db->whereRaw('0 = 1');
                }

            } else {
                $db = \DB::table('sync_db');

                switch ($clear['choice_connect']) {
                    case 'code_ean':
                        $db->leftJoin('items', "items.code_ean", '=', "sync_db.code_ean");
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        break;
                    case 'name':
                        $db->leftJoin('prod', 'prod.name', '=', 'sync_db.name');
                        $db->leftJoin('items', 'prod.id', '=', 'items.prod_id');
                        break;
                    case 'connect':
                        $db->leftJoin('items', "items.id", '=', "sync_db.item_id");
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        break;
                    case 'code_prod':
                        $db->leftJoin('items', "items.code_prod", '=', "sync_db.code_prod");
                        $db->leftJoin('prod', 'prod.id', '=', 'items.prod_id');
                        break;
                }

                switch ($clear['choice_join']) {
                    case 'left':
                        $db->whereNotNull('prod.id');
                        break;
                    case 'noleft':
                        $db->whereNull('prod.id');
                        break;
                    default:
                        break;
                }

                if (count($dev) > 0) {
                    $db->whereIn('sync_db.dev_id', $dev);
                } else {
                    $db->whereRaw('0 = 1');
                }
            }

            switch ($clear['choice_availability_count']) {
                case '1':
                    $db->where('availability_count', '>', '0');
                    break;
                case '2':
                    $db->where('availability_count', '<=', '0');
                    break;
                case '3':
                    $db->whereNull('availability_count');
                    break;
                default:
                    break;
            }

            if (Input::has('select_categorytext')) {
                $db->where('categorytext', '=', Input::get('choice_categorytext'));
            }

            if (Input::has('record')) {
                $db->where('record_id', '=', Input::get('record'));
            }

            switch ($clear['choice_prodmode']) {
                case '1':
                    $db->whereRaw('prod.mode_id > 1');
                    break;
                case '2':
                    $db->whereRaw('prod.mode_id = 1');
                    break;
                default:
                    break;
            }

            switch ($clear['choice_money']) {
                case 'same':
                    $db->whereRaw('sync_db.price_standard = prod.price')->whereNotNull('prod.price');
                    break;
                case 'diverse':
                    $db->whereRaw('sync_db.price_standard != prod.price')->whereNotNull('prod.price');
                    break;
                default:
                    break;
            }

            switch ($clear['choice_accessory']) {
                case '1':
                    $db->where('count_accessory', '>', '0');
                    break;
                case '2':
                    $db->where('count_accessory', '=', '0');
                    break;
                default:
                    break;
            }

            switch ($clear['choice_media']) {
                case '1':
                    $db->where('count_media', '>', '0');
                    break;
                case '2':
                    $db->where('count_media', '=', '0');
                    break;
                default:
                    break;
            }

            switch ($clear['choice_img']) {
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
                'sync_db.dev_id AS sync_dev_id',
                'sync_db.code_ean AS sync_code_ean',
                'sync_db.code_prod AS sync_code_prod',
                'sync_db.name AS sync_name',
                'sync_db.desc AS sync_desc',
                'sync_db.price_standard AS sync_price_standard',
                'items.id AS items_id',
                'items.code_ean AS items_code_ean',
                'items.code_prod AS items_code_prod',
                'prod.id AS prod_id',
                'prod.price AS prod_price',
                'prod.name AS prod_name',
                'prod.desc AS prod_desc',
                'prod.tree_id AS prod_tree_id',
                'prod.mode_id AS prod_mode_id'
            ]);

            return View::make('adm.sync.db.index', array_merge(
                $clear,
                ['db' => $db->paginate($clear['choice_limit'])]
            ));
        }
    }

    public function store()
    {
        $input = Input::all();
        $only = array_only($input, ['select_basic', 'select_connect', 'select_mixture_dev', 'select_join', 'select_limit', 'select_categorytext', 'select_prodmode', 'select_money', 'select_availability_count', 'select_accessory', 'select_media', 'select_img', 'record']);

        if (isset($input['sync_action']) && !empty($input['sync_action']) && isset($input['select']) && !empty($input['select'])) {

            switch ($input['sync_action']) {
                case 'fix_price' :
                    foreach ($input['select'] as $key => $val) {
                        $new_price = doubleval($input['sync_price_standard'][$key]);
                        if ($val == 'on' && $new_price > 0) {
                            $prod = Prod::select(['prod.id', 'prod.price'])->join('items', 'prod.id', '=', 'items.prod_id')->where('items.id', '=', $key)->firstOrFail();
                            $prod->price = $new_price;
                            $prod->save();
                        }
                    }
                    break;
                case 'fix_go_hidden' :
                    foreach ($input['select'] as $key => $val) {
                        if ($val == 'on') {
                            $prod = Prod::select(['prod.id', 'prod.price'])->join('items', 'prod.id', '=', 'items.prod_id')->where('items.id', '=', $key)->firstOrFail();
                            $prod->mode_id = 1;
                            $prod->save();
                        }
                    }
                    break;
            }
        }
        return Redirect::route('adm.sync.db.index', $only);
    }
}
