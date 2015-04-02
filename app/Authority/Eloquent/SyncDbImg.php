<?php namespace Authority\Eloquent;

class SyncDbImg extends \Eloquent
{
    protected $table = 'sync_db_img';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'data' => 'required'
    ];
}