<?php

use Authority\Authentication\AdminAuthentication;
use \Authority\Eloquent\PpcRules;

class PpcRulesController extends AdminAuthentication
{
    protected $rule;

    function __construct(PpcRules $rule)
    {
        parent::__construct();
        $this->rule = $rule;
    }

    public function index()
    {
        $rules = $this->rule->all();
        return View::make('adm.ppc.rules.index', compact('rules'));
    }

    public function show($id)
    {
        $rules = $this->rule->findOrFail($id);
        return View::make('adm.ppc.rules.show', compact('rules'));
    }

    public function create()
    {
        return View::make('adm.ppc.rules.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, PpcRules::$rules);

        if ($v->passes()) {
            $this->rule->create($input);
            return Redirect::route('adm.ppc.rules.index');
        }
        return Redirect::route('adm.ppc.rules.create')
            ->withInput()
            ->withErrors($v)
            ->with('message', 'Validační chyba');
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, PpcRules::$rules);

        if ($v->passes()) {
            $rules = $this->rule->find($id);
            $rules->update($input);

            return Redirect::route('adm.ppc.rules.show', $id);
        }
        return Redirect::route('adm.ppc.rules.edit', $id)
            ->withInput()
            ->withErrors($v)
            ->with('message', 'Validační chyba');
    }

    public function destroy($id)
    {
        $this->rule->find($id)->delete();
        return Redirect::route('adm.ppc.rules.index');
    }

}