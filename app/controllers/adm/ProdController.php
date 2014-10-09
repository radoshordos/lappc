<?php

use Authority\Eloquent\Prod;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\Items;
use Authority\Eloquent\ViewProd;
use Authority\Tools\SB;

class ProdController extends \BaseController
{
    protected $prod;
    protected $items;

    function __construct(Prod $prod, ViewProd $view, Items $items)
    {
        $this->prod = $prod;
        $this->items = $items;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/product/prod
     *
     * @return Response
     */

    public function index()
    {
        Input::has('select_limit') ? $input_limit = intval(Input::get('select_limit')) : $input_limit = 30;
        Input::has('select_sort') ? $input_sort = intval(Input::get('select_sort')) : $input_sort = 1;

        $db = ViewProd::dev(Input::get('select_dev'))
            ->tree(Input::get('select_tree'));

        switch ($input_sort) {
            case 2:
                $db->orderBy('prod_name', 'DESC');
                break;
            case 3:
                $db->orderBy('prod_price', 'DESC');
                break;
            default:
                $db->orderBy('prod_updated_at', 'ASC');
                break;
        }

        return View::make('adm.product.prod.index', [
            'view'        => $db->paginate($input_limit),
            'input_dev'   => Input::has('select_dev') ? intval(Input::get('select_dev')) : NULL,
            'input_tree'  => Input::has('select_tree') ? intval(Input::get('select_tree')) : NULL,
            'input_sort'  => Input::has('select_sort') ? intval(Input::get('select_sort')) : 1,
            'input_limit' => $input_limit,
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_dev'  => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name'])
        ]);
    }

    public function create()
    {
        return View::make('adm.product.prod.create', []);
    }

    public function edit($tree = 0, $prod = 0)
    {

        Input::has("list_tree") ? $true_tree = Input::get("list_tree") : $true_tree = $tree;
        Input::has("list_prod") ? $true_prod = Input::get("list_prod") : $true_prod = $prod;

        if ($prod != $true_prod || $tree != $true_tree) {
            return Redirect::route('adm.product.prod.edit', ['tree' => $true_tree, 'prod' => $true_prod]);
        }

        $row = $this->prod
            ->where('tree_id', '=', $true_tree)
            ->where('id', '=', $true_prod)
            ->first();

        $select_tree = SB::option("SELECT tree.id,tree.absolute,tree.name
                                 FROM tree
                                 INNER JOIN tree_dev ON tree.id = tree_dev.tree_id AND tree_dev.dev_id = 1
                                 WHERE dir_all > 0", ['id' => '[->id] - [->absolute] - ->name']);

        if (!isset($row->tree_id)) {

            return View::make('adm.product.prod.edit', [
                'list_tree'   => $select_tree,
                'list_prod'   => [''] + SB::optionBind("SELECT id,name,ic_all FROM prod WHERE tree_id = ?", [$tree], ['id' => '->name [i:->ic_all]']),
                'choice_tree' => $tree,
                'choice_prod' => $prod
            ])->with(['id' => $prod]);

        } else {

            return View::make('adm.product.prod.edit', [
                'list_tree'              => $select_tree,
                'list_prod'              => SB::optionBind("SELECT id,name,ic_all FROM prod WHERE tree_id = ? ORDER BY dev_id,name", [$tree], ['id' => '->name [i:->ic_all]']),
                'choice_tree'            => $tree,
                'choice_prod'            => $prod,
                'prod'                   => $row,
                'select_dev'             => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
                'select_tree'            => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
                'select_warranty'        => SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
                'select_dph'             => SB::option("SELECT * FROM dph WHERE visible = 1", ['id' => '->name']),
                'select_mode'            => SB::option("SELECT * FROM prod_mode WHERE visible = 1", ['id' => '->name']),
                'select_forex'           => SB::option("SELECT * FROM forex WHERE active = 1", ['id' => '->currency']),
                'select_sale'            => SB::option("SELECT * FROM items_sale WHERE visible = 1", ['id' => '->name']),
                'select_difference'      => SB::option("SELECT * FROM prod_difference WHERE visible = 1", ['id' => '->name [->count]']),
                'select_availability'    => SB::option("SELECT * FROM items_availability WHERE visible = 1 AND id > 1", ['id' => '->name']),
                'select_media_var'       => [""] + SB::option("SELECT * FROM media_variations WHERE type_id = 6", ['id' => '->name']),
                'table_items'            => $this->items->where('prod_id', '=', $prod)->get(),
                'table_prod_description' => ProdDescription::where('prod_id', '=', $prod)->get()

                /*
                'pdis' => $db->fetchAll($db->select()
                        ->from("prod2difference2in2set")
                        ->joinInner("prod2difference2set", Model_Zendb::ZEND_PROD2DIFF2IN2SET_2_PROD2DIFF2SET)
                        ->where("pdis_id_difference = ? ", intval($prod->prod_id_difference))
                );
                */
            ])->with(['id' => $prod]);
        }
    }


    public function update($tree, $prod)
    {

        $input = Input::all();

        if (Input::has('button-submit-edit')) {

            $row = $this->prod->find($prod);

            $input_prod = array_only($input, [
                'tree_id', 'dev_id', 'mode_id', 'warranty_id', 'forex_id',
                'dph_id', 'price', 'alias', 'name', 'desc', 'transport_weight', 'transport_atypical'
            ]);

            $input_prod['id'] = $row->id;
            $v = Validator::make($input_prod, Prod::$rules);

            if ($v->passes()) {
                if (intval(Input::get('difference_check')) == 1 && Input::get('difference_id') != $row->difference_id) {
                    $this->items->where('prod_id', '=', $prod)->delete();
                    $row->difference_id = Input::get('difference_id');
                    $row->save();
                }
                try {
                    $row->update($input_prod, $tree);
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
                return Redirect::route('adm.product.prod.edit', [$tree, $prod]);
            } else {
                Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                return Redirect::route('adm.product.prod.edit', [$tree, $prod])->withInput()->withErrors($v);
            }

            if (Input::has('code_ean')) {
                $input_items = array_only($input, ['visible', 'diff1', 'diff2', 'code_prod', 'code_ean', 'sale_id', 'availability_id', 'iprice']);
                foreach (array_keys(Input::get('code_ean')) as $key) {
                    $items = Items::find($key);
                    $items->visible = $input_items['visible'][$key];
                    $items->code_prod = $input_items['code_prod'][$key];
                    $items->code_ean = $input_items['code_ean'][$key];
                    $items->sale_id = $input_items['sale_id'][$key];
                    $items->availability_id = $input_items['availability_id'][$key];
                    $items->iprice = $input_items['iprice'][$key];
                    $items->save();
                }
            }

            $ida1 = array_only($input, ['data_id1', 'data_title1', 'data_input1']);
            if (intval($ida1['data_title1']) == 0 && intval($ida1['data_id1']) > 0) {
                ProdDescription::destroy(intval($ida1['data_id1']));
            } elseif (intval($ida1['data_id1']) == 0) {
                $pd1 = new ProdDescription;
                $pd1->prod_id = $prod;
                $pd1->variations_id = intval($ida1['data_title1']);
                $pd1->data = $ida1['data_input1'];
                $pd1->save();
            } elseif (intval($ida1['data_title1']) > 0) {
                $pd1 = ProdDescription::find(intval($ida1['data_id1']));
                $pd1->variations_id = intval($ida1['data_title1']);
                $pd1->data = $ida1['data_input1'];
                $pd1->save();
            }

            $ida2 = array_only($input, ['data_id2', 'data_title2', 'data_input2']);
            if (intval($ida2['data_title2']) == 0 && intval($ida2['data_id2']) > 0) {
                ProdDescription::destroy(intval($ida2['data_id2']));
            } elseif (intval($ida2['data_id2']) == 0) {
                $pd2 = new ProdDescription;
                $pd2->prod_id = $prod;
                $pd2->variations_id = intval($ida2['data_title2']);
                $pd2->data = $ida2['data_input2'];
                $pd2->save();
            } elseif (intval($ida2['data_title2']) > 0) {
                $pd2 = ProdDescription::find(intval($ida2['data_id2']));
                $pd2->variations_id = intval($ida2['data_title2']);
                $pd2->data = $ida2['data_input2'];
                $pd2->save();
            }

            $ida3 = array_only($input, ['data_id3', 'data_title3', 'data_input3']);
            if (intval($ida3['data_title3']) == 0 && intval($ida3['data_id3']) > 0) {
                ProdDescription::destroy(intval($ida3['data_id3']));
            } elseif (intval($ida3['data_id3']) == 0) {
                $pd3 = new ProdDescription;
                $pd3->prod_id = $prod;
                $pd3->variations_id = intval($ida3['data_title3']);
                $pd3->data = $ida3['data_input3'];
                $pd3->save();
            } elseif (intval($ida3['data_title3']) > 0) {
                $pd3 = ProdDescription::find(intval($ida3['data_id3']));
                $pd3->variations_id = intval($ida3['data_title3']);
                $pd3->data = $ida3['data_input3'];
                $pd3->save();
            }
        }
    }

}