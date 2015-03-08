<?php

use Authority\Tools\SB;
use Authority\Eloquent\Prod;

class ProdMultipleChangesController extends \BaseController
{

    public function index()
    {
        if (Input::has('multi-change') && Input::get('select_dev') > 1) {

            $prod = Prod::select('prod.id')->where('prod.dev_id', '=', Input::get('select_dev'));

            (Input::get('select_tree') > 0) ? $prod->where('prod.tree_id', '=', Input::get('select_tree')) : NULL;
            (Input::get('old_select_sale') > 0) ? $prod->where('prod.sale_id', '=', Input::get('old_select_sale')) : NULL;
            (Input::get('old_select_availability') > 0) ? $prod->where('items.availability_id', '=', Input::get('old_select_availability')) : NULL;
            $row = $prod->lists('items.id');

            if (Input::get('old_select_sale') > 0 && Input::get('new_select_sale') > 0 && count($row) > 0) {

                $affected = \DB::table('prod')
                    ->where('sale_id', '=', Input::get('old_select_sale'))
                    ->whereIn('prod.id', $row)
                    ->update(['sale_id' => Input::get('new_select_sale')]);

                Session::flash('success', "Změna slevy u " . intval($affected) . " položek.");
            }

            if (Input::get('old_select_availability') > 0 && Input::get('new_select_availability') > 0 && count($row) > 0) {

                $affected = \DB::table('items')
                    ->where('availability_id', '=', Input::get('old_select_availability'))
                    ->whereIn('items.id', $row)
                    ->update(['availability_id' => Input::get('new_select_availability')]);

                Session::flash('success', "Změna dostupnosti u " . intval($affected) . " položek.");
            }
        }

        return View::make('adm.pattern.multiplechanges.index', [
            'select_dev'                     => SB::option('SELECT * FROM dev ORDER BY id', ['id' => '[->id] - ->name']),
            'select_tree'                    => SB::option('SELECT * FROM view_tree WHERE tree_dir_all > 0', ['tree_id' => '[->tree_id] - [->tree_absolute] - ->tree_name'], true),
            'choice_select_dev'              => Input::get('select_dev'),
            'choice_select_tree'             => Input::get('select_tree'),
            'select_sale'                    => SB::option('SELECT * FROM prod_sale', ['id' => '->desc'], true),
            'select_availability'            => SB::option('SELECT * FROM items_availability WHERE id > 1', ['id' => '->name'], true),
            'choice_old_select_sale'         => Input::get('old_select_sale'),
            'choice_new_select_sale'         => Input::get('new_select_sale'),
            'choice_old_select_availability' => Input::get('old_select_availability'),
            'choice_new_select_availability' => Input::get('new_select_availability'),
        ]);
    }
}