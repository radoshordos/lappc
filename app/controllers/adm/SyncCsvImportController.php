<?php

use Authority\Tools\SB;

class SyncCsvImportController extends \BaseController
{
    public function create()
    {
        return View::make('adm.sync.csvimport.create',array(
            'sync_template' => [''] + SB::option('SELECT  sync_csv_template.id,
                                                          sync_csv_template.purpose,
                                                          mixture_dev.name,
                                                          (SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                                                            FROM sync_template_m2n_colmun
                                                            INNER JOIN sync_csv_column ON sync_csv_column.id = sync_template_m2n_colmun.column_id
                                                            WHERE sync_template_m2n_colmun.template_id = sync_csv_template.id
                                                          ) AS list
                                    FROM sync_csv_template
                                    INNER JOIN mixture_dev ON mixture_dev.id = sync_csv_template.mixture_dev_id
                                    ORDER BY mixture_dev_id,purpose', ['id' => ' [->name] [->purpose] ->list'])
        ));
    }

} 