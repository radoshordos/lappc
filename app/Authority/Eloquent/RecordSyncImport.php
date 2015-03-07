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

    public function mixtureDev()
    {
        return $this->hasOne('Authority\Eloquent\MixtureDev', 'id', 'mixture_dev_id');
    }

}