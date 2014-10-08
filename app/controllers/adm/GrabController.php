<?php

use Authority\Tools\SB;
use Authority\Eloquent\GrabProfile;
use Authority\Eloquent\GrabDb;

class GrabController extends \BaseController
{
    protected $gd;
    protected $gp;

    function __construct(GrabDb $gd, GrabProfile $gp)
    {
        $this->gd = $gd;
        $this->gp = $gp;
    }

    public function index()
    {
        {{ var_dump(Input::all()); }}

        return View::make('adm.tools.grab.index', [
            'get_select_group' => Input::get('select_group'),
            'select_group'     => [''] + SB::option("SELECT * FROM grab_profile WHERE active = 1 ORDER BY name", ['id' => '->name']),
            'select_column'    => [''] + SB::option("SELECT * FROM column_db WHERE visible_grab = 1 ORDER BY table_id,id", ['id' => '->name']),
            'grab_db'          => $this->gd->where('profile_id', '=', Input::get('select_group'))->orderBy('column_id', 'ASC')->get(),
            'grab_profile'     => $this->gp->orderBy('id')->get(),
        ]);
    }

    public function store()
    {
        $count = 0;
        if (Input::has('submit-update-profile')) {
            $input = Input::all();
            foreach (array_keys(Input::get('column_id')) as $key) {
                $row = GrabDb::find($key);
                $row->column_id = $input['column_id'][$key];
                $row->position = $input['position'][$key];
                $row->active = $input['active'][$key];
                $row->val1 = $input['val1'][$key];
                $row->val2 = $input['val2'][$key];
                $row->save();
            }
        }

        if (Input::has('submit-delete-profile')) {
            $input = Input::all();
            foreach (array_keys(Input::get('profile_checkbox')) as $key) {
                $count += GrabDb::destroy($key);
            }
            Session::flash('success', "Smazáno položek: <b>" . $count . "</b>");
            return Redirect::route('adm.tools.grab.index')->with('select_group');
        }

        if (Input::has('submit-profile-action') && Input::get('profile-action') > 0) {
            if (Input::get('profile-action') == 1 && count(Input::get('checkbox')) > 0) {
                foreach (array_keys(Input::get('checkbox')) as $key) {
                    $count += GrabProfile::destroy($key);
                }
                Session::flash('success', "Smazáno položek: <b>" . $count . "</b>");
                return Redirect::route('adm.tools.grab.index')->withInput();
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

        return Redirect::route('adm.tools.grab.index')->withInput();
    }

}