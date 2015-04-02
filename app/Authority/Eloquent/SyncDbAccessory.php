<?php namespace Authority\Eloquent;

class SyncDbAccessory extends \Eloquent
{
    protected $table = 'sync_db_accessory';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'connection' => 'required'
    ];
}