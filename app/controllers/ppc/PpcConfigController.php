<?php

use Authority\Authentication\AdminAuthentication;
use Authority\Eloquent\PpcConfig;

class PpcConfigController extends AdminAuthentication
{
    public function show()
    {
        $ppc_config = PpcConfig::all()->first();
        return View::make('adm.ppc.config.show', array('config' => $ppc_config));
    }
}