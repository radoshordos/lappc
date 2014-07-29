<?php namespace Authority\Tools\Import;

use Authority\Eloquent\SyncCsvTemplate;

class SyncImport
{
    private $columns;
    private $data;
    private $separator;

    public function __construct($templateId, $separator, $data)
    {
        $this->data = $data;
        $this->separator = $separator;
        $this->columns = $this->getColumnsName($templateId);
    }

    public function getColumnsName($templateId)
    {
        return \DB::table('sync_template_m2n_colmun')
            ->leftJoin('sync_csv_column', 'sync_template_m2n_colmun.column_id', '=', 'sync_csv_column.id')
            ->where('sync_template_m2n_colmun.template_id', '=', $templateId)
            ->orderBy('sync_template_m2n_colmun.id')
            ->get(array('sync_csv_column.element'));
    }
}