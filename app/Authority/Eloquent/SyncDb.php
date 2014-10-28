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

    public function dev()
    {
        return $this->hasOne('Authority\Eloquent\Dev', 'id', 'dev_id');
    }

}