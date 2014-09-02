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

    public function create()
    {
        return View::make('adm.product.akceminitext.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, AkceMinitext::$rules);

        if ($v->passes()) {
            $this->am->create($input);
            Session::flash('success', 'Nový minitext byl přidán');
            return Redirect::route('adm.product.akceminitext.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.product.akceminitext.create')->withInput()->withErrors($v);
        }
    }
}