<?php

use Authority\Eloquent\AkceTemplate;

class AkceTemplateController extends \BaseController
{
    protected $at;

    function __construct(AkceTemplate $at)
    {
        $this->at = $at;
    }

    public function index()
    {

        return View::make('adm.product.akcetemplate.index', array(
            'at' => $this->at->orderBy('id')->get()
        ));
    }
}