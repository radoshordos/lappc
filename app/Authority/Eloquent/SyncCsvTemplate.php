<?php

namespace Authority\Eloquent;

class SyncCsvTemplate extends \Eloquent
{
    protected $table = 'sync_csv_template';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array();
}