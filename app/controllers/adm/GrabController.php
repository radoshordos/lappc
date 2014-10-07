<?php


class GrabController extends \BaseController
{

    public function index()
    {
        return View::make('adm.tools.grab.index', []);
    }


    /*
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
    */
}