<?php namespace Authority\Eloquent;

class SyncDbMedia extends \Eloquent
{
    protected $table = 'sync_db_media';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'url' => 'required'
    ];
}