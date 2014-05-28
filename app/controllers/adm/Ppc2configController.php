<?php

use Authority\Eloquent\PpcConfig;

class Ppc2configController extends Controller
{
    public function show()
    {
        $ppc_config = PpcConfig::all()->first();
        return View::make('adm.ppc.config.show', array('config' => $ppc_config));
    }
}