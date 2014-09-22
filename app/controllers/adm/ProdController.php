<?php

use Authority\Eloquent\Prod;
use Authority\Eloquent\Items;
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

    /**
     * Display a listing of the resource.
     * GET /adm/product/prod/create
     *
     * @return Response
     */

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
                'list_prod'   => [''] + SB::optionBind("SELECT id,name FROM prod WHERE tree_id = ?", [$tree], ['id' => '->name']),
                'choice_tree' => $tree,
                'choice_prod' => $prod
            ])->with(['id' => $prod]);

        } else {

            return View::make('adm.product.prod.edit', [
                'list_tree'           => $select_tree,
                'list_prod'           => [] + SB::optionBind("SELECT id,name FROM prod WHERE tree_id = ? ORDER BY dev_id,name", [$tree], ['id' => '->name']),
                'choice_tree'         => $tree,
                'choice_prod'         => $prod,
                'prod'                => $row,
                'select_dev'          => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
                'select_tree'         => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
                'select_warranty'     => SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
                'select_dph'          => SB::option("SELECT * FROM dph WHERE visible = 1", ['id' => '->name']),
                'select_mode'         => SB::option("SELECT * FROM prod_mode WHERE visible = 1", ['id' => '->name']),
                'select_forex'        => SB::option("SELECT * FROM forex WHERE active = 1", ['id' => '->currency']),
                'select_sale'         => SB::option("SELECT * FROM items_sale WHERE visible = 1", ['id' => '->name']),
                'select_difference'   => SB::option("SELECT * FROM prod_difference WHERE visible = 1", ['id' => '->name [->count]']),
                'select_availability' => SB::option("SELECT * FROM items_availability WHERE visible = 1 AND id > 1", ['id' => '->name']),
                'table_items'         => $this->items->where('prod_id', '=', $prod)->get()
            ])->with(['id' => $prod]);
        }
    }


    public function update($tree, $prod)
    {
        $row = $this->prod->find($prod);
        $input_prod = array_except(Input::all(), ['_method', 'visible', 'diff1', 'diff2', 'code_prod', 'code_ean', 'sale_id', 'availability_id', 'iprice', 'difference_check','difference_id']);
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
    }
}