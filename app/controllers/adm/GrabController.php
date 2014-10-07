<?php

use \Authority\Eloquent\GrabProfile;

class GrabController extends \BaseController
{

    protected $gp;

    function __construct(GrabProfile $gp)
    {
        $this->gp = $gp;
    }

    public function index()
    {
        return View::make('adm.tools.grab.index', []);
    }

    public function store()
    {

            var_dump(Input::has('submit-add-group'));


        if (Input::has('submit-add-group')) {
            var_dump(Input::all());

            $input = array_only(Input::all(), array('charset','name'));
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
    }

}