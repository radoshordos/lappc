<?php

use Authority\Tools\SB;
use Authority\Eloquent\SyncDb;
use Authority\Eloquent\MixtureDevM2nDev;

class SyncCsvExportController extends \BaseController
{
    public function index()
    {
        $line = [];
        if (Input::has('export')) {
            $sdb = SyncDb::select([
                'name',
                'code_prod',
                'code_ean',
                \DB::raw('ROUND(price_action) AS price_action'),
                \DB::raw('ROUND(price_standard) AS price_standard'),
                'desc',
                'dev_id'
            ])
                ->where('purpose', '=', Input::get('select_import'))
                ->whereIn('sync_db.dev_id', MixtureDevM2nDev::where('mixture_dev_id', Input::get('select_mixture_dev'))->lists('dev_id'))
                ->orderBy("dev_id")
                ->orderBy("categorytext")
                ->orderBy("name")
                ->get();

            if (!empty($sdb)) {
                foreach ($sdb->toArray() as $val) {
                    $line[] = '"' . htmlspecialchars(implode('";"', $val)) . '"';
                }
            }
        }

        return View::make('adm.sync.csvexport.index', [
            'result'             => $line,
            'choice_export'      => Input::get('export'),
            'choice_mixture_dev' => Input::get('select_mixture_dev'),
            'choice_import'      => Input::get('select_import'),
            'select_mixture_dev' => SB::option("SELECT * FROM mixture_dev WHERE purpose = 'autosimple' OR purpose = 'devgroup' ORDER BY name", ['id' => '->name'])
        ]);
    }
}