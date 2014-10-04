<?php

use Authority\Eloquent\ViewProd;
use Authority\Tools\SB;

class AkceController extends \BaseController
{
    protected $prod;

    function __construct()
    {

    }

    public function index()
    {

        $db = ViewProd::where('prod_mode_id','=','4');

        return View::make('adm.product.akce.index', array(
            'akce' => $db->get()
        ));
    }



}