<?php

use Authority\Tools\SB;
use Authority\Tools\Button\Separator;
use Authority\Tools\Filter\Csv\CheckerGlobal;
use Authority\Tools\Import\SyncImport;
use Authority\Eloquent\SyncCsvTemplate;

class SyncCsvImportController extends \BaseController
{
    public function index()
    {
        $out = array(
            'template_id' => Input::get('template_id'),
            'check' => FALSE,
            'data_input'=> Input::get('data_input'),
            'separator' => Input::get('separator'),
            'sync_template' => [''] + SB::option('SELECT  sync_csv_template.id,sync_csv_template.purpose,
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
                                    ', ['id' => '[->name: &#8721;=->trigger_column_count] [->purpose] ->list'])
        );

        if (Input::exists('template_id') && Input::get('template_id') > 0) {

            if (Input::exists('validate')) {

                $sct = SyncCsvTemplate::find(Input::get('template_id'));
                $checker = new CheckerGlobal($sct, Input::get('data_input'),Separator::getSeparatorString(Input::get('separator')),CheckerGlobal::ENDOFLINE);

                try {
                    $checker->checkColumnQuantity();
                    $out['check'] = TRUE;
                    $out['data_input'] = $checker->getDataOutput();
                } catch (Exception $e) {
                    $out['check'] = FALSE;
                    $out['data_input'] = $checker->getDataOutput();
                    Session::flash('error', $e->getMessage());
                }

            } else if (Input::exists('next')) {

                try {
                    $imp = new SyncImport(Input::get('template_id'), Separator::getSeparatorString(Input::get('separator')), Input::get('data_input'));
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
            }
        }

        return View::make('adm.sync.csvimport.index', $out);
    }

}