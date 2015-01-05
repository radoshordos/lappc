<?php namespace Authority\Eloquent;

class SyncDbFile extends \Eloquent
{
    protected $table = 'sync_db_file';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'url' => 'required'
    ];

}