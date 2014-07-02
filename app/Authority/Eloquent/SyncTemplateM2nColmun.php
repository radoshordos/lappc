<?php

namespace Authority\Eloquent;

class SyncTemplateM2nColmun extends \Eloquent
{
    protected $table = 'sync_template_m2n_colmun';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'template_id' => 'required|exists:sync_csv_template,id',
        'column_id' => 'required|exists:sync_csv_column,id',
    );
}