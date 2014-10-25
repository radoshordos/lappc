<?php namespace Authority\Eloquent;

class SyncDb extends \Eloquent
{
    protected $table = 'sync_db';
    protected $guarded = [];

    public $incrementing = TRUE;

    public static $rules = [
        'purpose' => 'required',
        'dev_id'  => 'required|exists:dev,id'
    ];

}