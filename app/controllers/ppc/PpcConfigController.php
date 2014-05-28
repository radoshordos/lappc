<?php

use Authority\Eloquent\PpcConfig;

class PpcConfigController extends Controller
{
    public function show()
    {
        $ppc_config = PpcConfig::all()->first();
        return View::make('adm.ppc.config.show', array('config' => $ppc_config));
    }
}