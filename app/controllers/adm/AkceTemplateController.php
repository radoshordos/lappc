<?php

use Authority\Eloquent\AkceTemplate;

class AkceTemplateController extends \BaseController
{
    protected $akcetemplate;

    function __construct(AkceTemplate $akcetemplate)
    {
        $this->akcetemplate = $akcetemplate;
    }

    public function index()
    {
        return View::make('adm.product.akcetemplate.index', array(
            'akcetemplate' => $this->akcetemplate->orderBy('id')->get()
        ));
    }
}