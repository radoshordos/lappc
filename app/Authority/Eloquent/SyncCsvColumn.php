<?php

namespace Authority\Eloquent;

class SyncCsvColumn extends \Eloquent
{
    protected $table = 'sync_csv_column';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'element' => 'required'
    );


}