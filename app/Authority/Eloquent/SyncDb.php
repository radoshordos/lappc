<?php

namespace Authority\Eloquent;

class SyncDb extends \Eloquent
{
    protected $table = 'sync_db';

    public $incrementing = true;

    public static $rules = array(
        'purpose' => 'required',
        'dev_id' => 'required|exists:dev,id'
    );

}