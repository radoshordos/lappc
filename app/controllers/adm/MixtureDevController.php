<?php

use Authority\Eloquent\MixtureDev;
use Authority\Tools\SB;

class MixtureDevController extends \BaseController
{
    protected $mixture_dev;

    function __construct(MixtureDev $mixture_dev)
    {
        $this->mixture_dev = $mixture_dev;

        $this->group_insertable = [
            'devgroup'   => 'devgroup - Manuální skupina pro spojení více výrobců',
            'multimedia' => 'multimedia - Manuální skupina pro účel multimedií'
        ];

        $this->group_all = array_merge(
            $this->group_insertable,
            [
                'autoall'    => 'autoall - Automatická skupina všech výrobců',
                'autosimple' => 'autosimple - Automatická skupina jednotlivých výrobců'
            ]
        );
    }

    public function index()
    {
        $choice_purpose_all = (empty(Input::get('select_purpose_all')) ? 'devgroup' : Input::get('select_purpose_all'));

        return View::make('adm.pattern.mixturedev.index', [
            'mixturedev'         => MixtureDev::where('purpose', '=', $choice_purpose_all)->orderBy('id')->get(),
            'select_purpose_all' => $this->group_all,
            'choice_purpose_all' => $choice_purpose_all,
            'select_limit'       => ['20' => 'Limit 20', '30' => 'Limit 30', '90' => 'Limit 90'],
            'choice_limit'       => (intval(Input::get('select_limit')) == 0 ? 20 : intval(Input::get('select_limit')))
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixturedev.create', [
            'select_purpose' => $this->group_insertable,
            'choice_purpose' => Input::get('select_purpose')
        ]);
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
            'mixturedev'     => $mixture_dev,
            'select_purpose' => $this->group_insertable,
            'choice_purpose' => Input::get('select_purpose')
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