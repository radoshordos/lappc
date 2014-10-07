<?php

use Authority\Tools\SB;
use Authority\Eloquent\GrabProfile;

class GrabController extends \BaseController
{
    protected $gp;

    function __construct(GrabProfile $gp)
    {
        $this->gp = $gp;
    }

    public function index()
    {
        return View::make('adm.tools.grab.index', [
            'get_select_group' => Input::get('select_group'),
            'select_group' => [''] + SB::option("SELECT * FROM grab_profile WHERE active = 1 ORDER BY name", ['id' => '->name']),
            'grab_profile' => $this->gp->orderBy('id')->get(),
        ]);
    }

    public function store()
    {
/*
        if (Input::has('submit-profile-action') && Input::get('profile-action') > 0) {

            if (Input::get('profile-action') == 1 && count(Input::get('checkbox')) > 0) {
                $count = 0;
                foreach (array_keys(Input::get('checkbox')) as $key) {
                    $count += GrabProfile::destroy($key);
                }
                Session::flash('success', "Smazáno položek: <b>" . $count . "</b>");
            }
        }

        if (Input::has('submit-add-group')) {
            $input = array_only(Input::all(), ['charset', 'name']);
            $v = Validator::make($input, GrabProfile::$rules);

            if ($v->passes()) {
                try {
                    $this->gp->create($input);
                    Session::flash('success', 'Nová filtrační skupina byla přidána');
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
                return Redirect::route('adm.tools.grab.index');
            } else {
                Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                return Redirect::route('adm.tools.grab.index')->withInput()->withErrors($v);
            }
        }
*/
        return Redirect::route('adm.tools.grab.index')->withInput(Input::all());
    }

}