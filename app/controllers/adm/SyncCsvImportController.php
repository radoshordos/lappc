<?php

use Authority\Tools\SB;
use Authority\Tools\Filter\Csv\CheckerGlobal;
use Authority\Eloquent\SyncCsvTemplate;

class SyncCsvImportController extends \BaseController
{
    public function index()
    {
        $input = Input::all();

        $out = array(
            'template_id' => isset($input['template_id']) ? $input['template_id'] : NULL,
            'data_input' => isset($input['data_input']) ? $input['data_input'] : NULL,
            'check' => NULL,
            'sync_template' => [''] + SB::option('SELECT  sync_csv_template.id,sync_csv_template.purpose,sync_csv_template.separator,
                                                          mixture_dev.name,mixture_dev.trigger_column_count,
                                                          (SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                                                            FROM sync_template_m2n_colmun
                                                            INNER JOIN sync_csv_column ON sync_csv_column.id = sync_template_m2n_colmun.column_id
                                                            WHERE sync_template_m2n_colmun.template_id = sync_csv_template.id
                                                            ORDER BY sync_template_m2n_colmun.id
                                                          )  AS list
                                    FROM sync_csv_template
                                    INNER JOIN mixture_dev ON mixture_dev.id = sync_csv_template.mixture_dev_id
                                    ORDER BY mixture_dev_id,purpose
                                    ', ['id' => '[->name: &#8721;=->trigger_column_count] [->purpose] [->separator] ->list'])
        );

        if (isset($input['template_id']) && $input['template_id'] > 0) {

            $sct = SyncCsvTemplate::find($input['template_id']);
            $checker = new CheckerGlobal($sct, $input['data_input']);

            try {
                $checker->checkColumnQuantity(CheckerGlobal::ENDOFLINE, CheckerGlobal::DELIMITER);
                $out['check'] = TRUE;
            } catch (Exception $e) {
                $out['check'] = FALSE;
                Session::flash('error', $e->getMessage());
            }
        }

        return View::make('adm.sync.csvimport.index', $out);
    }

}