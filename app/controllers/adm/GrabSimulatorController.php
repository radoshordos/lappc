<?php

class GrabSimulatorController extends \BaseController
{

    public function index()
    {
        return View::make('adm.tools.grabsimulator.index', []);
    }

}