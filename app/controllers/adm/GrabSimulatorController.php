<?php

use Authority\Eloquent\GrabProfile;
use Authority\Tools\SB;

class GrabSimulatorController extends \BaseController
{

    public function index()
    {
        return View::make('adm.tools.grabsimulator.index', [
            'choise_profile_id' => intval(Input::get('profile_id')),
            'profile_url' => Input::get('profile_url'),
            'profile_id' => [''] + SB::option("SELECT * FROM grab_profile WHERE active = 1 ORDER BY name", ['id' => '->name']),
        ]);
    }

}