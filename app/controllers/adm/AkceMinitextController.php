<?php

use Authority\Eloquent\AkceMinitext;

class AkceMinitextController extends \BaseController
{
    protected $am;

    function __construct(AkceMinitext $am)
    {
        $this->am = $am;
    }

    public function index()
    {

        return View::make('adm.product.akceminitext.index', array(
            'am' => $this->am->orderBy('id')->get()
        ));
    }
}