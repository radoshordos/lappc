<?php

use Authority\Eloquent\Prod;
use Authority\Eloquent\ViewProd;
use Authority\Tools\SB;

class ProdController extends \BaseController
{
    protected $prod;
    protected $view;

    function __construct(Prod $prod, ViewProd $view)
    {
        $this->prod = $prod;
        $this->view = $view;
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

        switch($input_sort) {
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

        return View::make('adm.product.prod.index', array(
            'view' => $db->paginate($input_limit),
            'input_dev' =>  Input::has('select_dev') ? intval(Input::get('select_dev')) : NULL,
            'input_tree' => Input::has('select_tree') ? intval(Input::get('select_tree')) : NULL,
            'input_sort' => Input::has('select_sort') ? intval(Input::get('select_sort')) : 1,
            'input_limit' => $input_limit,
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_dev' => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name'])
        ));
    }

    /**
     * Display a listing of the resource.
     * GET /adm/product/prod/create
     *
     * @return Response
     */

    public function create()
    {
        return View::make('adm.product.prod.create', array());
    }

    public function edit($id)
    {
        $choice_tree = (intval(Input::get('list_tree') > 1) ? Input::get('list_tree') : Input::get('tree_id'));
        $choice_prod = (intval(Input::get('list_prod') > 1) ? Input::get('list_prod') : $id);

        if ($id != $choice_prod) {
            Redirect::action('ProdController@edit', $choice_prod);
        }

        $prod = $this->prod->where('id', '=', $choice_prod)->where('tree_id', '=', $choice_tree)->first();

        $select_tree = SB::option("SELECT tree.id,tree.absolute,tree.name
                                 FROM tree
                                 INNER JOIN tree_dev ON tree.id = tree_dev.tree_id AND tree_dev.dev_id = 1
                                 WHERE dir_all >0", ['id' => '[->id] - [->absolute] - ->name']);

        if (!isset($prod->tree_id)) {
            return View::make('adm.product.prod.edit', array(
                'list_tree' => $select_tree,
                'list_prod' => [''] + SB::optionBind("SELECT id,name FROM prod WHERE tree_id = ?", [$choice_tree], ['id' => '->name']),
                'choice_tree' => $choice_tree,
                'choice_prod' => $choice_prod
            ))->with(array('id' => $choice_prod));
        }

        return View::make('adm.product.prod.edit', array(
            'list_tree' => $select_tree,
            'list_prod' => [] + SB::optionBind("SELECT id,name FROM prod WHERE tree_id = ? ORDER BY dev_id,name", [$choice_tree], ['id' => '->name']),
            'choice_tree' => $choice_tree,
            'choice_prod' => $choice_prod,
            'prod' => $prod,
            'select_dev' => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_warranty' => SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
            'select_dph' => SB::option("SELECT * FROM dph WHERE visible = 1", ['id' => '->name']),
            'select_mode' => SB::option("SELECT * FROM prod_mode WHERE visible = 1", ['id' => '->name']),
            'select_forex' => SB::option("SELECT * FROM forex", ['id' => '->code (->currency)']),
        ))->with(array('id' => $choice_prod));

    }

    public function update($id)
    {
        $dev = $this->prod->find($id);
        $input = array_except(Input::all(), '_method');
        $input['id'] = $dev->id;
        $v = Validator::make($input, Prod::$rules);

        if ($v->passes()) {
            try {
                $input['id'] = $dev->id;
                $dev->update($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.product.prod.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.product.prod.edit', $id)->withInput()->withErrors($v);
        }
    }
}