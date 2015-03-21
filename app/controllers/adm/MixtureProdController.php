<?php

use Authority\Eloquent\MixtureProd;
use Authority\Eloquent\Dev;
use Authority\Tools\SB;

class MixtureProdController extends \BaseController
{
    protected $mp;

    function __construct(MixtureProd $mp)
    {
        $this->mp = $mp;
        $this->pa = ['multimedia' => 'multimedia - Grupy pro společné multimedia'];
    }

    public function index()
    {
        return View::make('adm.pattern.mixtureprod.index', [
            'mixtureprod' => $this->mp->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixtureprod.create', [
            'select_purpose' => $this->pa,
            'choice_purpose' => Input::get('select_purpose')
        ]);

    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureProd::$rules);

        if ($v->passes()) {
            $this->mp->create($input);
            Session::flash('success', 'Nový záznam do grupy produktů byl přidán');
            return Redirect::route('adm.pattern.mixtureprod.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureprod.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $mixprod = $this->mp->find($id);
        $choice_dev = Input::get('select_dev');

        if (is_null($mixprod)) {
            return Redirect::route('adm.pattern.mixtureprod.index');
        }

        return View::make('adm.pattern.mixtureprod.edit', [
            'select_dev'      => SB::optionEloqent(Dev::where('id', '>', '1')->orderBy('id')->get(), ['id' => '[->id] - ->name'], TRUE),
            'choice_dev'      => $choice_dev,
            'prod_insertable' => [''] + SB::option("SELECT * FROM prod WHERE dev_id = " . intval($choice_dev) . " AND id > 1 AND id NOT IN (SELECT prod_id FROM mixture_prod_m2n_prod WHERE mixture_prod_id = $id) ORDER BY id", ['id' => '[->tree_id] - ->name']),
            'id'              => $id,
            'mixtureprod'     => $mixprod,
            'select_purpose'  => $this->pa,
            'choice_purpose'  => Input::get('select_purpose'),
        ]);
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, MixtureProd::$rules);

        if ($v->passes()) {
            $mixprod = $this->mp->find($id);
            $mixprod->update($input);
            return Redirect::route('adm.pattern.mixtureprod.index', $id);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureprod.edit', $id)->withInput()->withErrors($v);
        }
    }
}