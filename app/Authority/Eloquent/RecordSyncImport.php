<?php namespace Authority\Eloquent;

class RecordSyncImport extends \Eloquent
{
    protected $table = 'record_sync_import';
    protected $guarded = [];
    public $timestamps = FALSE;

    public function syncCsvTemplate()
    {
        return $this->hasOne('Authority\Eloquent\SyncCsvTemplate', 'id', 'template_id');
    }

}