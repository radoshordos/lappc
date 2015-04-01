<?php namespace Authority\Eloquent;

class SyncDbSpecification extends \Eloquent
{
    protected $table = 'sync_db_specification';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'label' => 'required'
    ];
}