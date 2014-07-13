<?php

use Authority\Tools\Filter\Csv\CsvOptimal;

class ToolCsvOptimalController extends \BaseController
{
    public function index()
    {
        $csv = new CsvOptimal(Input::all());

        switch (Input::get('menu')) {
            case 6:
                $csv->reduceUnusableCharts();
                break;
        }

        return View::make('adm.tools.csvoptimal.index', array(
            'select_menu' => [
                "5" => "5] ARRAY UNIQUE AND SORT | Odstraní duplicitní řádky a setřídí položky",
                "6" => "6] REDUCE UNUSABLE CHARS | Odstraní prebytečné znaky"
            ],
            'menu' => Input::get('menu'),
            'data_input' => Input::get('data_input'),
            'data_output' => $csv->getDataOutput(),
            'data_bug' => $csv->getDataBug()
        ));
    }

}