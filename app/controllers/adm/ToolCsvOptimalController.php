<?php

class ToolCsvOptimalController extends \BaseController
{

    public function index()
    {

        print_r(Input::all());

        return View::make('adm.tools.csvoptimal.index', array(
            'select_menu' => [
                "5" => "5] ARRAY UNIQUE AND SORT | Odstraní duplicitní řádky a setřídí položky",
                "6" => "6] REDUCE UNUSABLE CHARS | Odstraní prebytečné znaky"
            ]
        ));

    }

    public function store() {
        return Redirect::action('ToolCsvOptimalController@index')->withInput(array('aaa' => 'aaa'));
    }

}