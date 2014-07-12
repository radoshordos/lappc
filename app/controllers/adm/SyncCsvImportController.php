<?php

use Authority\Tools\SB;

class SyncCsvImportController extends \BaseController
{
    public function create()
    {
        return View::make('adm.sync.csvimport.create',array(
            'sync_template' => [''] + SB::option('SELECT  sync_csv_template.id,sync_csv_template.purpose,sync_csv_template.trigger_desc,
                                                          mixture_dev.name,mixture_dev.trigger_column_count
                                                  FROM sync_csv_template
                                                  INNER JOIN mixture_dev ON mixture_dev.id = sync_csv_template.mixture_dev_id
                                                  ORDER BY purpose', ['id' => '[->name: &#8721;=->trigger_column_count] [->purpose] ->trigger_desc'])
        ));
    }

}