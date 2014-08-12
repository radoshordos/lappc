<?php

class ToolCalculatorController extends \BaseController
{
    public function index()
    {
        return View::make('adm.tools.calculator.index', array(
            'inputstr' => Input::get('inputstr'),
            'md5' => md5(Input::get('inputstr')),
            'sha1' => sha1(Input::get('inputstr')),
            'timedate' => date("d.m.Y H:i", intval(Input::get('inputstr')))
        ));
    }
}