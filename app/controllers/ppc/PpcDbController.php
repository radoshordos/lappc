<?php

use Authority\Eloquent\PpcDb;

class PpcDbController extends BaseController
{

    protected $ppcdb;

    function __construct(PpcDb $db)
    {
        $this->ppcdb = $db;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/ppc/db
     *
     * @return Response
     */
    public function index()
    {
        $ppcdb = $this->ppcdb->productName(Input::get('name'))
            ->take(10)
            ->get();

        return View::make('adm.ppc.db.index', array(
            'get' => Input::all(),
            'ppcdb' => $ppcdb
        ));
    }




}
