<?php

use Authority\Eloquent\Akce;

class AkceController extends \BaseController
{
    protected $akce;

    function __construct(Akce $akce)
    {
        $this->akce = $akce;
    }

    public function index()
    {
        return View::make('adm.product.akce.index', array(
            'akce' => $this->akce->orderBy('id')->get()
        ));
    }

    public function update($id) {
        return View::make('adm.product.akce.update', array(
            'akce' => null
        ));
    }
}