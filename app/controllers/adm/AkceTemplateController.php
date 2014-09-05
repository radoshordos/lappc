<?php

use Authority\Eloquent\AkceTempl;

class AkceTemplateController extends \BaseController
{
    protected $akcetemplate;

    function __construct(AkceTempl $akcetemplate)
    {
        $this->akcetemplate = $akcetemplate;
    }

    public function index()
    {
        return View::make('adm.product.akcetemplate.index', array(
            'akcetemplate' => $this->akcetemplate->orderBy('id')->get()
        ));
    }

    public function create()
    {
        return View::make('adm.product.akcetemplate.create');
    }
}