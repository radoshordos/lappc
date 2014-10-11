<?php

use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\ProdDifferenceSet;
use Authority\Eloquent\ProdDifferenceM2nSet;
use Authority\Tools\SB;

class ProdDifferenceController extends \BaseController
{

    protected $pd;
    protected $pds;
    protected $pdms;

    function __construct(ProdDifference $pd, ProdDifferenceSet $pds, ProdDifferenceM2nSet $pdms)
    {
        $this->pd = $pd;
        $this->pds = $pds;
        $this->pdms = $pdms;
    }

    public function index()
    {
        return View::make('adm.pattern.proddifference.index', [
            'prod_difference'         => ProdDifference::orderBy('id')->get(),
            'prod_difference_set'     => ProdDifferenceSet::orderBy('id')->get(),
            'prod_difference_n2m'     => ProdDifferenceM2nSet::where('difference_id', '=', intval(Input::get('choice_tab2')))->orderBy('id')->get(),
            'select_difference'       => [''] + SB::option('SELECT * FROM prod_difference WHERE visible = 1 AND id > 1', ['id' => '->name']),
            'select_difference_set'   => [''] + SB::option('SELECT * FROM prod_difference_set WHERE visible = 1 AND id > 1', ['id' => '->name']),
            'choice_tab2'             => intval(Input::get('choice_tab2')),
            'choice_tab2_set'         => intval(Input::get('choice_tab2_set')),
            'prod_difference_current' => ProdDifference::where('id', '=', intval(Input::get('choice_tab2')))->orderBy('id')->first()
        ]);
    }


    public function store()
    {
        if (Input::has('submit-new-difference')) {
            $input = array_only(Input::all(), ['id', 'count', 'name']);
            $v = Validator::make($input, ProdDifference::$rules);
            if ($v->passes()) {
                try {
                    $this->pd->create($input);
                    Session::flash('success', 'Nové seskupení bylo přidáno');
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
                return Redirect::route('adm.pattern.proddifference.index');
            } else {
                Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                return Redirect::route('adm.pattern.proddifference.index')->withInput()->withErrors($v);
            }
        } else if (Input::has('submit-new-set')) {
            $input = array_only(Input::all(), ['id', 'name', 'sortby']);
            $v = Validator::make($input, ProdDifferenceSet::$rules);
            if ($v->passes()) {
                try {
                    $this->pds->create($input);
                    Session::flash('success', 'Nová skupina byla přidána');
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
                return Redirect::route('adm.pattern.proddifference.index');
            } else {
                Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                return Redirect::route('adm.pattern.proddifference.index')->withInput()->withErrors($v);
            }
        } else if (Input::has('choice_tab2')) {
            $input = Input::all();
            try {
                $this->pdms->create(['difference_id' => $input['choice_tab2'], 'set_id' => $input['choice_tab2_set']]);
                Session::flash('success', 'Přidána položka nového seskupení');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::action('ProdDifferenceController@index', ['choice_tab2' => $input['choice_tab2']]);
        }
    }
}