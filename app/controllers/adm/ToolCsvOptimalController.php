<?php

use Authority\Tools\Filter\Csv\CsvOptimal;

class ToolCsvOptimalController extends \BaseController
{

	public function index()
	{
		$csv = new CsvOptimal(Input::get('data_input'));

		switch (Input::get('menu')) {
			case 1:
				$csv->clearBadCountColumn(Input::get('param1'));
				break;
			case 6:
				$csv->reduceUnusableCharts();
				break;
			case 11:
				$csv->colDestroy(Input::get('param1'));
				break;
			case 12:
				$csv->colReduceSpace(Input::get('param1'));
				break;
			case 13:
				$csv->colRound(Input::get('param1'));
				break;
			case 14:
				$csv->colTrim(Input::get('param1'));
				break;
		}

		return View::make('adm.tools.csvoptimal.index', [
			'select_menu' => [
				"1"  => "1] CLEAR BAD CHOOSE COUNT COLUMNS | Odstraní položky kterné nemají [Param 1] řádků",
//                "5" => "5] ARRAY UNIQUE AND SORT | Odstraní duplicitní řádky a setřídí položky",
				"6"  => "6] REDUCE UNUSABLE CHARS | Odstraní prebytečné znaky",
				"11" => "11] ROW TO DESTROY | Odstraní zvolený sloupec [Param 1]",
				"12" => "12] ROW TO SPACE ELIMINATE | Odstraní všechny mezery ve sloupci [Param 1]",
				"13" => "13] ROW TO ROUND | Zavolá funkci round na sloupec [Param 1]",
				"14" => "14] ROW TO TRIM | Odstraní ve zvolenám sloupci okrajové mezery [Param 1]"
			],
			'menu'        => Input::get('menu'),
			'param1'      => Input::get('param1'),
			'param2'      => Input::get('param2'),
			'data_input'  => Input::get('data_input'),
			'data_output' => $csv->getDataOutput(),
			'data_bug'    => $csv->getDataBug()
		]);
	}
}