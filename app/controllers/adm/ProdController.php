<?php

use Authority\Eloquent\Prod;
use Authority\Tools\SB;

class ProdController extends \BaseController
{

    protected $prod;

    function __construct(Prod $prod)
    {
        $this->prod = $prod;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/product/prod
     *
     * @return Response
     */

    public function index()
    {

        $prod = $this->prod
            ->orderBy('tree_id')
            ->get();

        return View::make('adm.pattern.prod.index', array(
            'prod' => $prod
        ));
    }

    public function edit($id)
    {
        $prod = $this->prod->find($id);

        if (is_null($prod)) {
            return Redirect::route('adm.pattern.prod.index');
        }

        return View::make('adm.pattern.prod.edit', array(
            'prod' => $prod,
            'select_dev' => SB::option("SELECT * FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
            'select_warranty' => SB::option("SELECT * FROM prod_warranty", ['id' => '[->id] - ->name']),
        ));
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