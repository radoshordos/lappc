<?php

namespace Authority\Eloquent;

class SyncCsvTemplate extends \Eloquent
{
    protected $table = 'sync_csv_template';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'mixture_dev_id' => 'required|exists:mixture_dev,id',
    );

    public function mixtureDev()
    {
        return $this->hasOne('Authority\Eloquent\MixtureDev', 'id', 'mixture_dev_id');
    }

}