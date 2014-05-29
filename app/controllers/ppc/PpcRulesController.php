<?php

use Authority\Eloquent\PpcRules;

class PpcRulesController extends Controller
{

    public function __construct(GroupForm $groupForm)
    {
        $this->groupForm = $groupForm;

    }


    public function show()
    {
        $rules = PpcRules::all();
        return View::make('adm.ppc.rules.show')->with('rules', $rules);
    }

    public function create()
    {
        return View::make('adm.ppc.rules.create');
    }

    public function store()
    {
        return Redirect::route('adm.ppc.rules.show');

        $result = $this->groupForm->save( Input::all() );

        Session::flash('success', $result);
        /*
        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('adm/groups');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('GroupController@create')
                ->withInput()
                ->withErrors( $this->groupForm->errors() );
        }
        */
    }


}