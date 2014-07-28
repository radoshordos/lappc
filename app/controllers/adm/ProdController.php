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
            ->orderBy('dev_id','ASC')->orderBy('prod_name','ASC')
            ->paginate(Input::get('limit'));

        return View::make('adm.pattern.prod.index', array(
            'view' => $view,
            'input' => $input,
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_dev' => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name'])
        ));
    }

    public function edit($id)
    {
        $prod = $this->prod->find($id);

        if (is_null($prod)) {
            return Redirect::route('adm.pattern.prod.index');
        }

        return View::make('adm.pattern.prod.edit', array(
            'list_tree' => SB::option("SELECT * FROM tree", ['id' => '[->id] - [->absolute] - ->name']),
            'list_prod' => [] + SB::optionBind("SELECT id,name FROM prod WHERE tree_id = ?", [Input::get('tree_id')], ['id' => '->name']),
            'prod' => $prod,
            'select_dev' => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_warranty' => SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
        ))->with("list_tree_id", Input::get('list_tree') ? Input::get('list_tree') : $prod->tree_id);
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
            return Redirect::route('adm.pattern.prod.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.prod.edit', $id)->withInput()->withErrors($v);
        }
    }

}