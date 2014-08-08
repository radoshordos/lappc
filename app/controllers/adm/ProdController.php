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
        $input = Input::all();

        $view = $this->view
            ->dev(Input::get('select_dev'))
            ->tree(Input::get('select_tree'))
            ->orderBy('dev_id', 'ASC')->orderBy('prod_name', 'ASC')
            ->paginate(Input::get('limit'));

        return View::make('adm.product.prod.index', array(
            'view' => $view,
            'input' => $input,
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
            ))->with(array('id' => $choozeProd));
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