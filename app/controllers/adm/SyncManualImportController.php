<?php

use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Eloquent\SyncDb;
use Authority\Tools\SB;

class SyncManualImportController extends \BaseController
{

    public function index()
    {
        $db = SyncDb::where('id', '>', '0');
        Input::has('select_limit') ? $input_limit = intval(Input::get('select_limit')) : $input_limit = 20;

        if (Input::has('select_mddev')) {
            $db->whereIn('dev_id', MixtureDevM2nDev::where('mixture_dev_id', '=', Input::get('select_mddev'))->lists('dev_id'));
        }

        return View::make('adm.sync.manualimport.index', [
            'data' => $db->paginate($input_limit),
            'choice_limit' => $input_limit,
            'choice_mddev' => Input::get('select_mddev'),
            'select_mddev' => SB::option('SELECT DISTINCT sd.dev_id,md.id AS mdid,md.purpose,md.name FROM sync_db as sd LEFT JOIN mixture_dev_m2n_dev as mdmd ON sd.dev_id = mdmd.dev_id INNER JOIN mixture_dev as md ON md.id = mdmd.mixture_dev_id ORDER BY md.purpose DESC,md.name', ['mdid' => '->name'], true)
        ]);
    }

} 