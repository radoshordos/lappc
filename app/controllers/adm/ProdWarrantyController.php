<?php

use Authority\Eloquent\ProdWarranty;


class ProdWarrantyController extends \BaseController
{
    protected $pw;

    function __construct(ProdWarranty $pw)
    {
        $this->pw = $pw;
    }

    public function index()
    {
        $input = Input::all();
        return View::make('adm.pattern.prodwarranry.index', array());
    }

    public function create()
    {
        return View::make('adm.pattern.prodwarranry.create', array());
    }
}