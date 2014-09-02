<?php

use Authority\Eloquent\AkceAvailability;

class AkceAvailabilityController extends \BaseController
{
    protected $aa;

    function __construct(AkceAvailability $aa)
    {
        $this->aa = $aa;
    }

    public function index()
    {
        return View::make('adm.product.akceavailability.index', array(
            'aa' => $this->aa->orderBy('id')->get()
        ));
    }

    public function create()
    {
        return View::make('adm.product.akceavailability.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, AkceAvailability::$rules);

        if ($v->passes()) {
            $this->aa->create($input);
            Session::flash('success', 'Nová akční dostupnost byla přidána');
            return Redirect::route('adm.product.akceavailability.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.product.akceavailability.create')->withInput()->withErrors($v);
        }
    }
}