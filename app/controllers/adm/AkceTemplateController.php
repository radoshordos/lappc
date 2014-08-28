<?php

use Authority\Eloquent\AkceTempl;

class AkceTemplateController extends \BaseController
{
    protected $at;

    function __construct(AkceTempl $at)
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