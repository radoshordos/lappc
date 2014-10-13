<?php

use Authority\Tools\Grab\Manipulation;
use Authority\Tools\SB;

class GrabSimulatorController extends \BaseController
{

    public function index()
    {

        if (URL::isValidUrl(Input::get('profile_url'))) {
            $grab = new Manipulation(Input::get('profile_url'), intval(Input::get('profile_id')));
        } else {
            $grab = NULL;
        }

        return View::make('adm.tools.grabsimulator.index', [
            'choise_profile_id' => intval(Input::get('profile_id')),
            'profile_url'       => Input::get('profile_url'),
            'profile_id'        => [''] + SB::option("SELECT * FROM grab_profile WHERE active = 1 ORDER BY name", ['id' => '->name']),
            'grab'              => $grab
        ]);
    }

}