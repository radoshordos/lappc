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
        return View::make('adm.tools.grab.index', [
            'get_select_group' => Input::get('select_group'),
            'select_group'     => [''] + SB::option("SELECT * FROM grab_profile WHERE active = 1 ORDER BY name", ['id' => '->name']),
            'select_column'    => [''] + SB::option("SELECT * FROM column_db WHERE visible_grab = 1 ORDER BY table_id,id", ['id' => '->name']),
            'select_function'  => [''] + SB::option("SELECT gf.*,gm.alias FROM grab_function AS gf INNER JOIN grab_mode AS gm ON gf.mode_id = gm.id WHERE gf.visible ORDER BY gf.mode_id,gf.function", ['id' => '->function [->alias] - [->name]']),
            'grab_db'          => $this->gd->where('profile_id', '=', Input::get('select_group'))->orderBy('column_id', 'ASC')->get(),
            'grab_profile'     => $this->gp->orderBy('id')->get(),
        ]);
    }

    public function store()
    {
        $count = 0;

        if (Input::has('submit-insert-profile-column')) {
            $input = array_only(Input::all(), ['column_id', 'function_id', 'profile_id', 'position', 'val1', 'val2']);
            $v = Validator::make($input, GrabDb::$rules);

            if ($v->passes()) {
                try {
                    $this->gd->create($input);
                    Session::flash('success', 'Nový řádek přidán');
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
                return Redirect::route('adm.tools.grab.index', ['select_group' => $input['profile_id']]);
            } else {
                Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                return Redirect::route('adm.tools.grab.index')->withInput()->withErrors($v);
            }
        }

        if (Input::has('submit-profile-action')) {

            if (Input::get('profile-action') == 1 && count(Input::get('checkbox')) > 0) {
                foreach (array_keys(Input::get('checkbox')) as $key) {
                    $count += GrabProfile::destroy($key);
                }
                Session::flash('success', "Smazáno položek: <b>" . $count . "</b>");
                return Redirect::route('adm.tools.grab.index')->withInput();
            }

            if (Input::get('profile-action') == 2 && count(Input::get('checkbox')) > 0) {
                foreach (array_keys(Input::get('checkbox')) as $key) {
                    $grab_profile = GrabProfile::where('id', '=', $key)->first();
                    $grab_db = GrabDb::where('profile_id', '=', $key)->get();

                    $bind = [
                        "active"  => $grab_profile->active,
                        "charset" => $grab_profile->charset,
                        "name"    => "Clone " . $grab_profile->name
                    ];

                    DB::transaction(function () use ($bind, $grab_db) {
                        $gp = GrabProfile::create($bind);
                        foreach ($grab_db as $row) {
                            GrabDb::create([
                                'profile_id'  => $gp->id,
                                'column_id'   => $row->column_id,
                                'function_id' => $row->function_id,
                                'active'      => $row->active,
                                'position'    => $row->position,
                                'val1'        => $row->val1,
                                'val2'        => $row->val2,
                            ]);
                        }
                    });
                }
                return Redirect::route('adm.tools.grab.index')->withInput();
            }
        }

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
            return Redirect::route('adm.tools.grab.index', ['select_group' => $input['select_group']]);
        }

        if (Input::has('submit-delete-profile') && count(Input::get('profile_checkbox')) > 0) {
            $input = Input::all();
            foreach (array_keys(Input::get('profile_checkbox')) as $key) {
                $count += GrabDb::destroy($key);
            }
            Session::flash('success', "Smazáno položek: <b>" . $count . "</b>");
            return Redirect::route('adm.tools.grab.index', ['select_group' => $input['select_group']]);
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
        return Redirect::route('adm.tools.grab.index');
    }

    function cloneFilters()
    {

        $db = Model_Zendb::myfactory();

        if (!empty($_POST["form_fp_yes"])) {
            foreach ($_POST["form_fp_yes"] as $key => $val) {
                if ($val == 1) {


                    $bind = [
                        "fp_id_category" => $_POST["db_fp_id_category"][$key],
                        "fp_visible"     => $_POST["db_fp_visible"][$key],
                        "fp_charset"     => $_POST["db_fp_charset"][$key],
                        "fp_name"        => "Clone " . $_POST["db_fp_name"][$key]
                    ];

                    $table_filter = $db->fetchAll($db->select()->from("filter")->where($db->quoteInto("filter_id_profile = ?", intval($key))));
                    $db->beginTransaction();
                    $db->insert("filter2profile", $bind);
                    $lastInsertId = $db->lastInsertId();

                    foreach ($table_filter as $key => $value) {

                        $db->insert("filter", [
                            "filter_id_profile" => $lastInsertId,
                            "filter_id_column"  => $value->filter_id_column,
                            "filter_id_type"    => $value->filter_id_type,
                            "filter_pozition"   => $value->filter_pozition,
                            "filter_val1"       => $value->filter_val1,
                            "filter_val2"       => $value->filter_val2,
                        ]);
                    }
                    $db->commit();
                }
            }
        }
    }

}