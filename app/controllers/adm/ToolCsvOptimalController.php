<?php

use Authority\Tools\Filter\Csv\CsvOptimal;

class ToolCsvOptimalController extends \BaseController
{
    public function index()
    {
        $csv = new CsvOptimal(Input::get('data_input'));

        switch (Input::get('menu')) {
            case 6:
                $csv->reduceUnusableCharts();
                break;
            case 11:
                $csv->colDestroy(Input::get('col'));
                break;
            case 12:
                $csv->colReduceSpace(Input::get('col'));
                break;
            case 13:
                $csv->colRound(Input::get('col'));
                break;
        }

        return View::make('adm.tools.csvoptimal.index', array(
            'select_menu' => [
//                "5" => "5] ARRAY UNIQUE AND SORT | Odstraní duplicitní řádky a setřídí položky",
                "6" => "6] REDUCE UNUSABLE CHARS | Odstraní prebytečné znaky",
                "11" => "11] ROW TO DESTROY | Odstraní zvolený sloupec",
                "12" => "12] ROW TO SPACE ELIMINATE | Odstraní všechny mezery ve sloupci",
                "13" => "13] ROW TO ROUND | Zavolá funkci round na sloupec"
            ],
            'menu' => Input::get('menu'),
            'col'  => Input::get('col'),
            'data_input' => Input::get('data_input'),
            'data_output' => $csv->getDataOutput(),
            'data_bug' => $csv->getDataBug()
        ));
    }

}