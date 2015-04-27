<?php namespace Authority\Runner\Task\Store;

use Authority\Eloquent\RecordSyncImport;

class AbstractSync
{
    protected $tm;
    protected $table;
    protected $message = [];
    protected $resultTime = 0;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getFeedDirName()
    {
        return $this->getSyncUploadDirectory() . $this->getFile();
    }

    public function getSyncUploadDirectory()
    {
        return __DIR__ . "/data/";
    }

    public function getClassName()
    {
        return $this->table->class;
    }

    public function addMessage($comment)
    {
        $this->message[] = $comment;
    }

    public function addRecordCounter($record_id, $all, $suc, $mixture_dev_id = NULL)
    {
        $rsi = RecordSyncImport::find($record_id);
        $rsi->item_counter_all = $all;
        $rsi->item_counter_insert = $suc;
        $rsi->mixture_dev_id = $mixture_dev_id;
        $rsi->save();
    }

    public function getMessages()
    {
        if (count($this->message) > 0) {
            return implode("<br />", $this->message);
        }
    }

    public function getResultTime()
    {
        return $this->resultTime;
    }

    public function setResultTime($resultTime)
    {
        $this->resultTime = $resultTime;
    }
}