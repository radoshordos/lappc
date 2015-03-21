<?php

use Authority\Eloquent\ProdDifferenceValues;
use Authority\Tools\SB;

class ProdVariationController extends \BaseController
{
    protected $pdv;

    function __construct(ProdDifferenceValues $pdv)
    {
        $this->pdv = $pdv;
    }

    public function index()
    {
        $choice_prod_difference = intval(Input::get('select_difference_set'));
        return View::make('adm.pattern.prodvariation.index', [
            'choice_difference_set'  => $choice_prod_difference,
            'select_difference_set'  => [''] + SB::option("SELECT * FROM prod_difference_set WHERE visible = 1 AND id > 1", ['id' => '->name']),
            'prod_difference_values' => $this->pdv->where('set_id', '=', $choice_prod_difference)->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.prodvariation.create', [
            'select_difference_set' => SB::option("SELECT * FROM prod_difference_set WHERE visible = 1 AND id > 1", ['id' => '->name'])
        ]);
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, ProdDifferenceValues::$rules);

        if ($v->passes()) {
            try {
                $this->pdv->create($input);
                Session::flash('success', 'Nová variace pro produkty byla přidána');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::action('ProdVariationController@index', ['select_difference_set' => $input['set_id']]);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.prodvariation.create')->withInput()->withErrors($v);
        }
    }
}