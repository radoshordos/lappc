<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;
use Authority\Eloquent\MixtureDevM2nDev;


class SyncDbController extends \BaseController
{
    public function index()
    {

        $dev = \DB::table('mixture_dev_m2n_dev')->where('mixture_dev_id', Input::get('select_mixture_dev'))->lists('dev_id');
        $select_mixture_dev = SB::option("SELECT * FROM mixture_dev ORDER BY name", ['id' => '->name']);

        if (strlen(Input::get('select_connect')) == 0 || count($dev) == 0) {

            return View::make('adm.sync.db.index', array(
                'input' => Input::all(),
                'select_mixture_dev' => $select_mixture_dev
            ));

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

            $db->select(array(
                'sync_db.id AS sync_id',
                'sync_db.code_ean AS sync_code_ean',
                'sync_db.code_prod AS sync_code_prod',
                'sync_db.name AS sync_name',
                'sync_db.desc AS sync_desc',
                'sync_db.price_standart AS sync_price_standart',
                'items.code_ean AS items_code_ean',
                'items.code_prod AS items_code_prod',
                'prod.name AS prod_name'
            ));

            $db->whereIn('sync_db.dev_id', $dev);



            return View::make('adm.sync.db.index', array(
                'db' => $db->get(),
                'input' => Input::all(),
                'select_mixture_dev' => $select_mixture_dev
            ));
        }
    }
}

/*
 * switch (intval($_GET['join'])) {
    case 1:
        $select->from("items", array("items_id", "items_id_diff1", "items_id_diff2", "items_price_end", "items_code_product"));
        $select->joinLeft("sync2items", "items.items_code_product = sync2items.si_items_code_product", array("si_id", "si_items_code_product", "si_prod_name", "si_items_price_end"));
        $select->joinInner("prod", "items.items_id_prod = prod.prod_id", array("prod_id", "prod_id_tree", "prod_id_mode", "prod_name"));
        $select->joinInner("tree", "tree.tree_id = prod.prod_id_tree", array("tree_id_division"));
        break;
    case 2:
        $select->from("items", array("items_id", "items_id_diff1", "items_id_diff2", "items_price_end", "items_code_product"));
        $select->joinInner("sync2items", "items.items_code_product = sync2items.si_items_code_product", array("si_id", "si_items_code_product", "si_prod_name", "si_items_price_end"));
        $select->joinInner("prod", "items.items_id_prod = prod.prod_id", array("prod_id", "prod_id_tree", "prod_id_mode", "prod_name"));
        $select->joinInner("tree", "tree.tree_id = prod.prod_id_tree", array("tree_id_division"));
        break;
    case 3:
        $select->from("sync2items", array("si_id", "si_items_code_product", "si_prod_name", "si_items_price_end"));
        $select->joinLeft("items", "items.items_code_product = sync2items.si_items_code_product", array("items_id", "items_id_diff1", "items_id_diff2", "items_id_diff3", "items_price_end", "items_code_product"));
        $select->joinLeft("prod", "items.items_id_prod = prod.prod_id", array("prod_id", "prod_id_tree", "prod_id_mode", "prod_name",));
        break;
    case 4:
        $select->from("sync2items", array("si_id", "si_items_code_product", "si_prod_name", "si_items_price_end", "items_code_product"));
        $select->joinInner("items", "items.items_code_product = sync2items.si_items_code_product", array("items_id", "items_id_diff1", "items_id_diff2", "items_id_diff3", "items_price_end"));
        $select->joinInner("prod", "items.items_id_prod = prod.prod_id", array("prod_id", "prod_id_tree", "prod_id_mode", "prod_name"));
        break;
}

 */