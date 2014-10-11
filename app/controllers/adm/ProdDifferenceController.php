<?php

use Authority\Eloquent\ProdDifference;
use Authority\Eloquent\ProdDifferenceSet;
use Authority\Eloquent\ProdDifferenceM2nSet;
use Authority\Tools\SB;

class ProdDifferenceController extends \BaseController
{

    protected $pd;
    protected $ps;

    function __construct(ProdDifference $pd, ProdDifferenceSet $pds)
    {
        $this->pd = $pd;
        $this->pds = $pds;
    }

    public function index()
    {
        return View::make('adm.pattern.proddifference.index', [
            'prod_difference'     => ProdDifference::orderBy('id')->get(),
            'prod_difference_set' => ProdDifferenceSet::orderBy('id')->get(),
            'prod_difference_n2m' => ProdDifferenceM2nSet::where('difference_id', '=', intval(Input::get('choice_tab2')))->orderBy('id')->get(),
            'select_difference'   => [''] + SB::option('SELECT * FROM prod_difference WHERE visible = 1 AND id > 1', ['id' => '->name']),
            'choice_tab2'         => intval(Input::get('choice_tab2'))


            /*
            $pdis_use = $db->fetchAll($db->select()
                ->from("prod2difference2in2set")
                ->where("pdis_id_difference=?", intval($_GET['pd_id']))->order(array("pdis_id")));
            */
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
            return Redirect::route('adm.pattern.proddifference.index');
        }




        //array(5) { ["_token"]=> string(40) "2yv3hpTyUNW0Cs1e3W3bCzvS3GEr7F7m657pUBMB" ["submit-new-difference"]=> string(33) "Přidej název nového seskupení" ["id"]=> string(1) "1" ["count"]=> string(1) "1" ["name"]=> string(6) "ghjhgj" }

        var_dump(Input::all());
        die;

    }
}