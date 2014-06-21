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
            'select_dev' => SB::option("SELECT * FROM dev", ['id' => '[->id] - ->name']),
            'select_tree' => SB::option("SELECT * FROM tree", ['id' => '[->id] - ->name']),
            'select_warranty' => SB::option("SELECT * FROM prod_warranty", ['id' => '[->id] - ->name']),
        ));

    }

}