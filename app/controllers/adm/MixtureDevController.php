<?php

use Authority\Eloquent\MixtureDev;
use Authority\Tools\SB;

class MixtureDevController extends \BaseController
{
    protected $mixture_dev;

    function __construct(MixtureDev $mixture_dev)
    {
        $this->mixture_dev = $mixture_dev;
    }

    public function index()
    {
        return View::make('adm.pattern.mixturedev.index', [
            'mixturedev' => $this->mixture_dev->whereIn('purpose', ['autosimple', 'devgroup'])->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixturedev.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureDev::$rules);

        if ($v->passes()) {
            $this->mixture_dev->create($input);
            Session::flash('success', 'Nový záznam do skupiny výrobce byl přidán');
            return Redirect::route('adm.pattern.mixturedev.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $mixture_dev = $this->mixture_dev->find($id);

        if (is_null($mixture_dev)) {
            return Redirect::route('adm.pattern.mixturedev.index');
        }

        return View::make('adm.pattern.mixturedev.edit', [
            'dev_insertable' => [''] + SB::option("SELECT * FROM dev WHERE id > 1 AND id NOT IN (SELECT dev_id FROM mixture_dev_m2n_dev WHERE mixture_dev_id = $id) ORDER BY id", ['id' => '[->id] - ->name']),
            'mixturedev'     => $mixture_dev
        ]);
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, MixtureDev::$rules);

        if ($v->passes()) {
            $mixture_dev = $this->mixture_dev->find($id);
            $mixture_dev->update($input);
            return Redirect::route('adm.pattern.mixturedev.index', $id);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.edit', $id)->withInput()->withErrors($v);
        }
    }

}