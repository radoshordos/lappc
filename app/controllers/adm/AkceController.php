<?php

use Authority\Eloquent\Prod;

class AkceController extends \BaseController
{
    protected $prod;

    function __construct(Prod $prod)
    {
        $this->prod = $prod;
    }

    public function index()
    {
        return View::make('adm.product.akce.index', array(
            'akce' => $this->prod->where('prod.mode_id', '=', '4')
                ->leftJoin('akce', 'prod.id', '=', 'akce.prod_id')
                ->leftJoin('akce_template', 'akce.template_id', '=', 'akce_template.id')
                ->get(array(
                    'prod.name',
                    'prod.id AS prod_id',
                    'akce.template_id',
                    'akce_template.bonus_title'
                ))
        ));
    }

    public function edit($id)
    {
        return View::make('adm.product.akce.edit', array(
            'akce' => null
        ));
    }

}