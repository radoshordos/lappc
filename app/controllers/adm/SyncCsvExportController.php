<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;

class SyncCsvExportController extends \BaseController
{
	public function index()
	{
		if (Input::has('export')) {
			$sdb = SyncDb::select(['name', 'code_prod', 'code_ean', \DB::raw('ROUND(price_standard) AS price_standard'), 'desc', 'dev_id', 'updated_at'])
				->where('purpose', '=', Input::get('select_import'))
				->orderBy("dev_id")
				->limit(10)
				->get();

			if (!empty($sdb)) {
				foreach ($sdb->toArray() as $val) {
					$line[] = implode(";", $val);
				}

				var_dump($line);
				echo "<br />";
			}
		}

		return View::make('adm.sync.csvexport.index', [
			'choice_export'      => Input::get('export'),
			'choice_mixture_dev' => Input::get('select_mixture_dev'),
			'choice_import'      => Input::get('select_import'),
			'select_mixture_dev' => SB::option("SELECT * FROM mixture_dev WHERE purpose = 'autosimple' OR purpose = 'devgroup' ORDER BY name", ['id' => '->name'])
		]);
	}
}