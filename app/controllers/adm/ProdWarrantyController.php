<?php

use Authority\Eloquent\ProdWarranty;

class ProdWarrantyController extends \BaseController
{
    protected $pw;

    function __construct(ProdWarranty $pw)
    {
        $this->pw = $pw;
    }

    public function index()
    {
        return View::make('adm.pattern.prodwarranty.index', array(
            'pw' => DB::table('prod_warranty')
                ->select(array('prod_warranty.*',
                    DB::raw('COUNT(prod.warranty_id) as warranty_count')
                ))
                ->leftJoin('prod', 'prod.warranty_id', '=', 'prod_warranty.id')
                ->groupBy('prod_warranty.id')
                ->get()
        ));
    }

    public function create()
    {
        return View::make('adm.pattern.prodwarranty.create', array());
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, ProdWarranty::$rules);

        if ($v->passes()) {
            try {
                $this->pw->create($input);
                Session::flash('success', 'Nová záruka byla přidána');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.prodwarranty.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.prodwarranty.create')->withInput()->withErrors($v);
        }
    }
}