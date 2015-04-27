<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;
use Authority\Runner\Task\TaskAbstract;

class AbstractSync extends TaskAbstract
{
    public function __construct($dbTable)
    {
        parent::__construct($dbTable);
    }

    public function getFeedDirName()
    {
        return $this->getSyncUploadDirectory() . $this->getFile();
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function addRecordCounter($record_id, $all, $suc, $mixture_dev_id = NULL)
    {
        $rsi = RecordSyncImport::find($record_id);
        $rsi->item_counter_all = $all;
        $rsi->item_counter_insert = $suc;
        $rsi->mixture_dev_id = $mixture_dev_id;
        $rsi->save();
    }
}