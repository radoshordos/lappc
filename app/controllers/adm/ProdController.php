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

        return View::make('adm.pattern.prod.index',array(
            'prod' => $prod
        ));
    }
}