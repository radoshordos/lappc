<?php namespace Authority\Eloquent;

class SyncRecord extends \Eloquent
{
    protected $table = 'sync_record';
    protected $guarded = [];
    public $timestamps = FALSE;

    public function syncCsvTemplate()
    {
        return $this->hasOne('Authority\Eloquent\SyncCsvTemplate', 'id', 'template_id');
    }

}