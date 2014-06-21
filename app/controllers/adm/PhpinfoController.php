<?php

class PhpinfoController extends \BaseController
{
    public function index()
    {
        return View::make('adm.admin.phpinfo.index');
    }

}